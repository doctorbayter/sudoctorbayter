<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedPurchaseReto;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\ActiveCampaignService;
use Illuminate\Http\Request;
use App\Services\HotmartService;
use App\Services\ManyChatService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HotmartController extends Controller
{
    protected $hotmartService;

    public function __construct(HotmartService $hotmartService)
    {
        $this->hotmartService = $hotmartService;
    }

    public function usersWithoutSubscription($productId)
    {
        $productId; //'3647377'
        $fechaReferencia = '2023-12-14';
        $batchSize = 100; // Número de usuarios a procesar en cada lote

        // $usersWithoutSubscription = User::doesntHave('subscriptions')
        //                                 ->where('created_at', '>', $fechaReferencia);

        // $usersWithoutSubscription->chunkById($batchSize, function ($users) use ($productId) {
            
        // foreach ($users as $user) {
        //     // Lógica para verificar con la API de Hotmart y activar el usuario
            
        //     $response = $this->hotmartService->getCustomerProduct($productId , $user->email);
            
        //     if (!empty($response) && isset($response['items']) && $response['items'] > 0) {
        //         echo $user->name . " (Activado) - " . $user->email . "<br/>";
        //     } else {
        //         echo $user->name . " (No activado) - " . $user->email . "<br/>";
        //     }                
        // }
        // });

        $response = $this->hotmartService->getCustomerProduct($productId , 'natalia.arizahernandez@gmail.com');
            
            if (!empty($response) && isset($response['items']) && $response['items'] > 0) {

             return $this->buyerInfo($response);

                echo 'Jeff Cote' . " (Activado) - " . 'natalia.arizahernandez@gmail.com' . "<br/>";
            } else {
                echo 'Jeff Cote' . " (No activado) - " . 'natalia.arizahernandez@gmail.com' . "<br/>";
            }                

    }

    private function buyerInfo($buyerData)
    {
        $buyer = null;
        // Verificar si hay items y buscar el comprador
        if (!empty($buyerData['items'])) {
            foreach ($buyerData['items'] as $item) {
                if (isset($item['users']) && is_array($item['users'])) {
                    foreach ($item['users'] as $user) {
                        if (isset($user['role']) && $user['role'] === 'BUYER') {
                            $buyer = $user['user']; // Guardar información del comprador
                            break 2; // Salir de ambos bucles
                        }
                    }
                }
            }
            $buyerInfo = [
                "first_name" => $this->getFirstName($buyer['name']),
                "last_name" => null,
                "phone" => $buyer['phone'],
                "whatsapp_phone" => $buyer['phone'],
                "email" => $buyer['email'],
                "has_opt_in_email" => true,
                "has_opt_in_sms" => true,
                "consent_phrase" => "Yes"
            ];   
            return $buyerInfo;
        }

        return null;
    }


    private function sendReto(Request $request)
    {        
        $plan_id = $request->query('plan');
        $fase_id = $request->query('fase');
        $user_first_name = $request->query('first_name');
        $user_email = $request->query('email');
        $user_last_name = $request->query('last_name', null); // Opcional
        $user_phone = $request->query('phone', null); // Opcional

        if (!empty($user_last_name)) {
            $user_name = $user_first_name . ' ' . $user_last_name;
        } else {
            $user_name = $user_first_name;
        }

        $user = User::firstOrCreate(
            ['email' => $user_email],
            ['name' => $user_name, 'password' => Hash::make('123456')]
        );

        $plan = Plan::find($plan_id);
        $fase = Fase::find($fase_id);
        Subscription::create(['user_id' => $user->id, 'plan_id' => $plan->id]);

        if ($fase && $fase->clients()->where('users.id', $user->id)->doesntExist()) {
            $fase->clients()->attach($user->id);
        }

        $activeCampaignService = new ActiveCampaignService();
            $contact = $activeCampaignService->verifyOrCreateContact($user->name, $user->email);
        
            if ($contact) {
                $activeCampaignService->addContactToList($contact['id'], 64);
                $activeCampaignService->assignTagToContact($contact['id'], 44);
            }

        if (!empty($user_phone)) {
            $manyChatService = new ManyChatService();
            $subscriberData = [
                "first_name" => $user_first_name,
                "last_name" => $user_last_name,
                "phone" => $user_phone,
                "whatsapp_phone" => $user_phone,
                "email" => $user_email,
                "has_opt_in_email" => true,
                "has_opt_in_sms" => true,
                "consent_phrase" => "Yes"
            ];   
            $tagName = "Desafio-2024";
            $manyChatService->processSubscriberByEmail($subscriberData, $tagName);
        }

        $mail = new ApprovedPurchaseReto($plan, $user);
        Mail::to($user->email)->send($mail);
        return 'Reto activo correctamente.'; 

    }

    private function getFirstName($fullName) {
        $parts = explode(' ', $fullName);
        return $parts[0];
    }

    
}

