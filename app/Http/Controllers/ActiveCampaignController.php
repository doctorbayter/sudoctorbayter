<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Services\ActiveCampaignService;

class ActiveCampaignController extends Controller
{
    protected $activeCampaignService;

    public function __construct(ActiveCampaignService $activeCampaignService)
    {
        $this->activeCampaignService = $activeCampaignService;
    }

    public function addContact(Request $request)
    {
        // $fullName = $request->input('fullName');
        // $email = $request->input('email');


        $plans = Subscription::whereIn('plan_id', [7])
        ->whereYear('created_at', '=', 2024)
        ->whereMonth('created_at', '>=', 02)
        ->skip(115)
        ->get();

        foreach ($plans as $plan) {
            $contact = $this->activeCampaignService->verifyOrCreateContact($plan->user->name, $plan->user->email);
            if ($contact) {
                $result = $this->activeCampaignService->addContactToList($contact['id'], 73);
                //$result = $this->activeCampaignService->assignTagToContact($contact['id'], 44);
                //return response()->json($result);
            }
           
        }
     

        

        return response()->json(['error' => 'No se pudo crear o verificar el contacto'], 500);
    }
}

