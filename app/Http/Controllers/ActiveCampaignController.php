<?php

namespace App\Http\Controllers;

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

        $fullName = "Jeff Cote";
        $email = "yefer.cote@hotmail.com";

        $contact = $this->activeCampaignService->verifyOrCreateContact($fullName, $email);

        if ($contact) {
            $result = $this->activeCampaignService->addContactToList($contact['id'], 64);
            $result = $this->activeCampaignService->assignTagToContact($contact['id'], 44);
            return response()->json($result);
        }

        return response()->json(['error' => 'No se pudo crear o verificar el contacto'], 500);
    }
}

