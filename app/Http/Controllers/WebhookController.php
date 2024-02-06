<?php

namespace App\Http\Controllers;

use App\Services\ManyChatService;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    protected $manyChatService, $productTagMap, $tagId;


    public function __construct()
    {
        $this->manyChatService = new ManyChatService();
        $this->productTagMap = [
            '2572759' => '41293479', // Plan Premium
            '3755875' => '41293492', // Plan Premium RG
            
        ];
        $this->tagId = 41926233; // Sales Recovery

    }
    
    protected function findOrCreateUser($subscriberData)
    {
       return $subscriber = $this->manyChatService->processSubscriberByEmail($subscriberData, $this->tagId);
    }

    public function handleZapierWebhook(Request $request)
    {
        $secretToken = $request->header('X-Zapier-Token'); // O dondequiera que hayas colocado el token

        if ($secretToken !== env('ZAPIER_SECRET_TOKEN')) {
            // Si el token no coincide, responde con un error
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $user_name = $request->post('name');
        $user_first_name = $request->post('first_name');
        $user_last_name = $request->post('last_name');
        $user_email = $request->post('email');
        $user_phone_number = $request->post('phone_checkout_number');
        $status = $request->post('status');
        $product_id = $request->post('prod');
        $product_offert = $request->post('off');

        $subscriberData = [
            "first_name" => $user_first_name,
            "last_name" => $user_last_name,
            "phone" => $user_phone_number,
            "whatsapp_phone" => $user_phone_number,
            "email" => $user_email,
            "has_opt_in_email" => true,
            "has_opt_in_sms" => true,
            "consent_phrase" => "Yes"
        ];  

        $this->findOrCreateUser($subscriberData);
        // Log para propósitos de depuración
    }
}
