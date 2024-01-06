<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ManyChatService;

class ManyChatController extends Controller
{
    protected $manyChatService;

    public function __construct(ManyChatService $manyChatService)
    {
        $this->manyChatService = $manyChatService;
    }

    public function handleRequest(Request $request)
    {
        $subscriberData = [
            "first_name" => "Carmen",
            "last_name" => "Sánchez",
            "phone" => "573105181175",
            "whatsapp_phone" => "573105181175",
            "email" => "casara489@hotmail.com",
            "has_opt_in_email" => true,
            "has_opt_in_sms" => true,
            "consent_phrase" => "Yes"
        ];   
        $tagName = "Desafio-2024";
        $result = $this->manyChatService->processSubscriberByEmail($subscriberData, $tagName);

    }
}