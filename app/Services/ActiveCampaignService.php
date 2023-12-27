<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ActiveCampaignService
{
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->baseUrl = env('ACTIVECAMPAIGN_BASE_URL');
        $this->apiKey = env('ACTIVECAMPAIGN_API_KEY');
    }

    public function verifyOrCreateContact($fullName, $email)
    {
    
        try {
            $response = Http::withHeaders([
                'Api-Token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ])->get("{$this->baseUrl}/api/3/contacts", [
                'email' => $email
            ]);
    
            $body = $response->json();

            if (empty($body['contacts'])) {
                [$firstName, $lastName] = $this->splitName($fullName);
    
                $response = Http::withHeaders([
                    'Api-Token' => $this->apiKey,
                    'Content-Type' => 'application/json'
                ])->post("{$this->baseUrl}/api/3/contacts", [
                    'contact' => [
                        'email' => $email,
                        'firstName' => $firstName,
                        'lastName' => $lastName
                    ]
                ]);
    
               $body = $response->json();

               return $body['contact'];
            }
    
            return $body['contacts'][0];
        } catch (\Exception $e) {
            //\Log::error('Error en ActiveCampaignService: ' . $e->getMessage());
            return null;
        }
    }
    
    private function splitName($fullName)
    {
        $parts = explode(' ', trim($fullName));
        if (count($parts) === 1) {
            return [$parts[0], ''];
        }
        $lastName = array_pop($parts);
        $firstName = implode(' ', $parts);
        return [$firstName, $lastName];
    }

    public function addContactToList($contactId, $listId)
    {
        try {
            $response = Http::withHeaders([
                'Api-Token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ])->post("{$this->baseUrl}/api/3/contactLists", [
                'contactList' => [
                    'list' => $listId,
                    'contact' => $contactId,
                    'status' => 1
                ]
            ]);

            return true;
        } catch (\Exception $e) {
            //\Log::error('Error al agregar contacto a la lista: ' . $e->getMessage());
            return null;
        }
    }

    public function assignTagToContact($contactId, $tagId)
    {
        try {
            $response = Http::withHeaders([
                'Api-Token' => $this->apiKey
            ])->post("{$this->baseUrl}/api/3/contactTags", [
                'contactTag' => [
                    'contact' => $contactId,
                    'tag' => $tagId
                ]
            ]);

            return true;
        } catch (\Exception $e) {
            //\Log::error('Error al asignar etiqueta al contacto: ' . $e->getMessage());
            return null;
        }
    }

    public function isContactInList($contactId, $listId)
    {
        try {
            $response = Http::withHeaders([
                'Api-Token' => $this->apiKey
            ])->get("{$this->baseUrl}/api/3/contacts/{$contactId}/contactLists");

            $contactLists = $response->json()['contactLists'] ?? [];

            foreach ($contactLists as $contactList) {
                if ($contactList['list'] == $listId && $contactList['status'] == 1) {
                    return true;
                }
            }

            return false;
        } catch (\Exception $e) {
            //\Log::error('Error al verificar la membresía en la lista: ' . $e->getMessage());
            return false;
        }
    }


}
