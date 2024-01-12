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
            "first_name" => "Jeff",
            "last_name" => "Cote",
            "phone" => "3155217037",
            "whatsapp_phone" => "3155217037",
            "email" => "yefer.cote@hotmail.com",
            "has_opt_in_email" => true,
            "has_opt_in_sms" => true,
            "consent_phrase" => "Yes"
        ];   
        $tagID = "41113727";
        $result = $this->manyChatService->processSubscriberByEmail($subscriberData, $tagID);

    }
}