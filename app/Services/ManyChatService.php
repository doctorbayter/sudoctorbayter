<?php
// app/Services/ManyChatService.php

namespace App\Services;

use App\Contracts\ManyChatServiceInterface;
use Illuminate\Support\Facades\Http;

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

    public function createSubscriber($email, $subcriberAttributes = []): array
    {
        $data = array_merge(['email' => $email], $subcriberAttributes);
        $response = $this->makeApiRequest('get', 'createSubscriber', $data);

        return $response;
    }

    public function addTagToSubscriber($subscriberId, $tagName): array
    {
        return $this->makeApiRequest('get', 'addTag', ['subscriber_id' => $subscriberId,'tag_name' => $tagName]); 
    }
    
    public function getSubscriberByName(string $subscriberName): array
    {
        return $this->makeApiRequest('get', 'findByName', ['name' => $subscriberName]);
    }

    public function findBySystemField(string $subscriberEmail): array
    {
        return $this->makeApiRequest('get', 'findBySystemField', ['email' => $subscriberEmail]);
    }
}
