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

    public function getSubscriberInfo(string $subscriberId): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json'
        ])->get("{$this->baseUrl}/subscriber/getInfo", [
            'subscriber_id' => $subscriberId
        ]);

        if (!$response->successful()) {
            // Manejo avanzado de errores
            throw new \Exception("Error al comunicarse con ManyChat");
        }

        return $response->json();
    }
}
