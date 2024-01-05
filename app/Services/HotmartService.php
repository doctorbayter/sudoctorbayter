<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HotmartService
{
    private $clientId;
    private $clientSecret;
    private $basicAuth;

    public function __construct()
    {
        $this->clientId = env('HOTMART_CLIENT_ID');
        $this->clientSecret = env('HOTMART_CLIENT_SECRET');
        $this->basicAuth = env('HOTMART_BASIC_AUTH');
    }

    public function obtenerTokenOAuth()
    {
        
        
        $response =  Http::asForm()->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $this->basicAuth,
        ])->post('https://api-sec-vlc.hotmart.com/security/oauth/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret
        ]);
        
        if ($response->successful()) {
            
            return $response['access_token'] ?? null;
        } else {
            return "error";
        }
    }

    public function getCustomerProduct($productId, $userEmail)
    {
        $accessToken = $this->obtenerTokenOAuth();
        
        if (!$accessToken) {
            return null; // O manejar error
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('https://developers.hotmart.com/payments/api/v1/sales/users', [
            'product_id' => $productId,
            'buyer_email' => $userEmail
        ]);

        return $response->json();
    }


}
