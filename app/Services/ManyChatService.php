<?php
// app/Services/ManyChatService.php

namespace App\Services;

use App\Contracts\ManyChatServiceInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ManyChatService implements ManyChatServiceInterface
{
    protected string $baseUrl = 'https://api.manychat.com/fb';
    protected string $token;

    public function __construct()
    {
        $this->token = config('manychat.api_token');
    }
    protected function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ];
    }

    public function makeApiRequest(string $method, string $endpoint, array $parameters): array
    {
        // Prepara la URL y los encabezados
        $url = "{$this->baseUrl}/subscriber/{$endpoint}";
        $headers = $this->getHeaders();

        // Realiza la solicitud HTTP según el método (GET, POST, etc.)
        $response = match ($method) {
            'get' => Http::withHeaders($headers)->get($url, $parameters),
            'post' => Http::withHeaders($headers)->post($url, $parameters),
            // Puedes añadir más métodos HTTP aquí (put, delete, etc.)
            default => throw new \InvalidArgumentException("Método HTTP no soportado: {$method}"),
        };

        // Manejo de errores
        if (!$response->successful()) {
            $responseBody = json_decode($response->body(), true);
        
            // Verifica si la respuesta tiene un mensaje de error específico
            if (isset($responseBody['status']) && $responseBody['status'] === 'error') {
                
                // throw new \App\Exceptions\ManyChatApiException(
                //     "Error al comunicarse con ManyChat: " . $response->body(),
                //     $response->status()
                // );

                return $response->json();
            }
        }
        return $response->json();

    }

    public function createSubscriber(array $subscriberData): array
    {
        $response = $this->makeApiRequest('post', 'createSubscriber', $subscriberData);

        // Verifica si la respuesta tiene un mensaje de error específico
        if (isset($response['status']) && $response['status'] === 'error') {
            return $response['details'];
        }

        if (!isset($response['data'])) {
            throw new \Exception("Error al crear el suscriptor en ManyChat");
        }

        return $response;
    }

    public function updateSubscriber(array $subscriberData): array
    {
        if (isset($subscriberData['subscriber_id'])) {
            $response = $this->makeApiRequest('post', 'updateSubscriber', $subscriberData);
        }else{

            $userInfo = $this->findByCustomField($subscriberData['phone']);
            if(isset($userInfo['status']) && $userInfo['status'] === 'error'){
                return $userInfo;
            }else{
                if (isset($subscriberData['whatsapp_phone'])) {
                    unset($subscriberData['whatsapp_phone']); // Eliminar 'whatsapp_phone'
                }
                // Obtener o calcular el valor para 'subscriber_id'
                $subscriberId = $userInfo['id']; 
                
                // Agregar 'subscriber_id' al array
                $subscriberData['subscriber_id'] = $subscriberId;
                $response = $this->makeApiRequest('post', 'updateSubscriber', $subscriberData);
            }  
        }
        if (!empty($response['data']) && $response['status'] === 'success') { 
            return ['status' => 'subscriber_updated', 'subscriber' => $subscriberData];           
        }
    }

    public function addTagToSubscriber($subscriberId, $tagName): array
    {
        return $this->makeApiRequest('post', 'addTagByName', ['subscriber_id' => $subscriberId,'tag_name' => $tagName]); 
    }

    public function setCustomField($subscriberId, $subscriberField): array
    {
        return $this->makeApiRequest('post', 'setCustomField', ['subscriber_id' => $subscriberId,'field_id' => '10373983', 'field_value' => $subscriberField]); 
    }
    
    public function getSubscriberByName(string $subscriberName): array
    {
        return $this->makeApiRequest('get', 'findByName', ['name' => $subscriberName]);
    }

    public function findBySystemField(string $subscriberEmail): array
    {
        return $this->makeApiRequest('get','findBySystemField', ['email' => $subscriberEmail]);
    }

    public function findByCustomField(string $subscriberField): array
    {
        $response =  $this->makeApiRequest('get','findByCustomField', [
                                                                    'field_id' => '10373983',
                                                                    'field_value' => $subscriberField
                                                                ]);
        if (!empty($response['data']) && isset($response['status']) && $response['status'] === 'success') { 
            return $response['data'][0];            
        }

        $response['status'] = "error";
        return $response;

    }

    public function processSubscriberByEmail(array $subscriberData, string $tagName): array
    {
        
        // Extraer el correo electrónico del array de datos del suscriptor
        $email = $subscriberData['email'] ?? null;

        // Buscar el suscriptor por correo electrónico
        $subscriber = $this->findBySystemField($email);

        if (isset($subscriber['data']) && empty($subscriber['data'])) {

            // Si el suscriptor no existe, crearlo y luego agregar la etiqueta
            $newSubscriber = $this->createSubscriber($subscriberData);

            if (isset($newSubscriber['messages']['whatsapp_phone']['message'][0]) && $newSubscriber['messages']['whatsapp_phone']['message'][0] === 'WhatsApp subscriber with this phone number already exists') {

                    $newSubscriber = $this->updateSubscriber($subscriberData);
                    if (isset($newSubscriber['status']) && $newSubscriber['status'] === 'error' && empty($newSubscriber['data'])) {

                        //set custom field Pendiente...
                        return  ['status' => 'failed_to_create_user', 'subscriber' => $subscriber];
                    }else{
                        $newSubscriberId = $newSubscriber['subscriber']['subscriber_id']; // Asegúrate de usar el campo correcto para el ID
                    }                    
            }else if(isset($newSubscriber['data']) && !empty($newSubscriber['data'])){
               
                $newSubscriberId = $newSubscriber['data']['id']; // Asegúrate de usar el campo correcto para el ID
                $data = array_merge(['subscriber_id' => $newSubscriberId], $subscriberData);

                if (isset($subscriberData['whatsapp_phone'])) {
                    unset($subscriberData['whatsapp_phone']); // Eliminar 'whatsapp_phone'
                }
                $this->updateSubscriber($data);
                $setCustomField = $this->setCustomField($newSubscriberId, $subscriberData['phone']);
            }else{
                return ['status' => 'error', 'subscriber' => $newSubscriber];
            }
            
            $this->addTagToSubscriber($newSubscriberId, $tagName);
            return ['status' => 'subscriber_created_and_tag_added', 'subscriber' => $newSubscriber];
        } else {
            // Si el suscriptor existe, agregar la etiqueta
            $subscriberId = $subscriber['data']['id']; // Asegúrate de usar el campo correcto para el ID
            $this->addTagToSubscriber($subscriberId, $tagName);

            return ['status' => 'tag_added', 'subscriber' => $subscriber];
        }
    }
}