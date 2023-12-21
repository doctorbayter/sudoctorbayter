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
            throw new \App\Exceptions\ManyChatApiException(
                "Error al comunicarse con ManyChat: " . $response->body(),
                $response->status()
            );
        }
        return $response->json();

    }

    public function createSubscriber(array $subscriberData): array
    {
        $response = $this->makeApiRequest('post', 'createSubscriber', $subscriberData);

        if (!isset($response['data'])) {
            throw new \Exception("Error al crear el suscriptor en ManyChat");
        }

        return $response;
    }

    public function updateSubscriber(array $subscriberData): array
    {
        $response = $this->makeApiRequest('post', 'updateSubscriber', $subscriberData);

        if (!isset($response['data'])) {
            throw new \Exception("Error al crear el suscriptor en ManyChat");
        }

        return $response;
    }

    public function addTagToSubscriber($subscriberId, $tagName): array
    {
        return $this->makeApiRequest('post', 'addTagByName', ['subscriber_id' => $subscriberId,'tag_name' => $tagName]); 
    }
    
    
    public function getSubscriberByName(string $subscriberName): array
    {
        return $this->makeApiRequest('get', 'findByName', ['name' => $subscriberName]);
    }

    public function findBySystemField(string $subscriberPhone): array
    {
        return $this->makeApiRequest('get','findBySystemField', ['phone' => $subscriberPhone]);
    }

    public function processSubscriberByEmail(array $subscriberData, string $tagName): array
    {
        // Extraer el correo electrónico del array de datos del suscriptor
        $phone = $subscriberData['phone'] ?? null;
        if (!$phone) {
            throw new \InvalidArgumentException("El número telefónico es necesario para procesar el suscriptor");
        }

        // Buscar el suscriptor por correo electrónico
        $subscriber = $this->findBySystemField($phone);

        if (isset($subscriber['data']) && empty($subscriber['data'])) {
            // Si el suscriptor no existe, crearlo y luego agregar la etiqueta
            $newSubscriber = $this->createSubscriber($subscriberData);
            $newSubscriberId = $newSubscriber['data']['id']; // Asegúrate de usar el campo correcto para el ID
            $this->addTagToSubscriber($newSubscriberId, $tagName);

            $data = array_merge(['subscriber_id' => $newSubscriberId], $subscriberData);
            $updateSubscriber = $this->updateSubscriber($data);

            return ['status' => 'subscriber_created_and_tag_added', 'subscriber' => $newSubscriber];
        } else {
            // Si el suscriptor existe, agregar la etiqueta
            $subscriberId = $subscriber['data']['id']; // Asegúrate de usar el campo correcto para el ID
            $this->addTagToSubscriber($subscriberId, $tagName);

            return ['status' => 'tag_added', 'subscriber' => $subscriber];
        }
    }

}
