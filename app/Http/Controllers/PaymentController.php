<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedPurchase;
use App\Mail\ApprovedPurchaseEvent;
use App\Mail\ApprovedPurchaseNoChat;
use App\Mail\ApprovedPurchaseReto;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Discount;
use App\Models\User;
use App\Services\ActiveCampaignService;
use App\Services\PayUService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Services\ManyChatService;
use Fomo\FomoClient;
use Fomo\FomoEventBasic;

class PaymentController extends Controller
{

    public function responsePayu(Request $request, Plan $plan){
        $response = Http::acceptJson()->post(config('services.payu.api_uri'), [
            "test" => config('services.payu.test'),
            "language" => "es",
            "command" => "ORDER_DETAIL_BY_REFERENCE_CODE",
            "merchant" => [
                "apiLogin" => config('services.payu.secret'),
                "apiKey" => config('services.payu.key')
            ],
            "details" => [
                "referenceCode" => $request->input('referenceCode')
            ]
        ])->throw()->json();

        if ($response['code'] == "SUCCESS") {

            if ($response['result']['payload']) {
                if ($response['result']['payload'][0]['status'] == "CAPTURED") {

                    $user_data                  = explode('~',$response['result']['payload'][0]['transactions'][0]['extraParameters']['EXTRA1']);
                    $user                       = $this->getUserData($user_data);
                    $this->setUserData($user, $plan);

                }else if($response['result']['payload'][0]['status'] == "IN_PROGRESS"){
                    //
                }
            }
        }
        $pay_data = $request;
        return view('payment.payu.approved', compact('plan', 'pay_data'));
    }

    public function approvedPayu(Request $request){

        if($request->state_pol == 4 ){
            //Log::info($request);
            $extra1 = $request->extra1;
            $extra2 = $request->extra2;

            $user_data =  explode('~',$extra1);
            $plan = Plan::find($extra2);

            $user = $this->getUserData($user_data);
            $this->sendMail($user, $plan);
            $this->setUserData($user, $plan);
        }
    }

    public function responseEpayco(Request $request, Plan $plan){

        if($request->input('ref_payco')){
            $ref_payco =  $request->input('ref_payco');
            $url = 'https://secure.epayco.co/validation/v1/reference/'.$ref_payco;
            $response = Http::get($url);
            $json = $response->json();

            if (isset($json['status']) && $json['status'] == false) {
                return abort(403);
            }else
                if ($json['success'] == "true") {

                $epayco_data = $json['data'];
                return view('payment.epayco.approved', compact('plan', 'epayco_data'));
            }else{
                return abort(403);
            }
        } else{
            return abort(403);
        }
    }

    public function approvedePayco(Request $request){

        $p_cust_id_cliente = config('services.epayco.client_id');
        $p_key             = config('services.epayco.p_key');

        $x_extra1          = $request->x_extra1; //Client id
        $x_extra2          = $request->x_extra2; // plan id

        $x_ref_payco      = $request->x_ref_payco;
        $x_transaction_id = $request->x_transaction_id;
        $x_amount         = $request->x_amount;
        $x_currency_code  = $request->x_currency_code;
        $x_signature      = $request->x_signature;

        $signature = hash('sha256', $p_cust_id_cliente . '^' . $p_key . '^' . $x_ref_payco . '^' . $x_transaction_id . '^' . $x_amount . '^' . $x_currency_code);

        $x_response     = $request->x_response;
        $x_motivo       = $request->x_response_reason_text;
        $x_id_invoice   = $request->x_id_invoice;
        $x_autorizacion = $request->x_approval_code;


        $user_data =  explode('~',$x_extra1);
        $plan = Plan::find($x_extra2);

        //Validamos la firma
        if ($x_signature == $signature) {
            /*Si la firma esta bien podemos verificar los estado de la transacción*/
            $x_cod_response = $request->x_cod_response;
            switch ((int) $x_cod_response) {
                case 1:
                    // "transacción aceptada"
                    $user = $this->getUserData($user_data);
                    $this->sendMail($user, $plan);
                    $this->setUserData($user, $plan);

                break;
            }
        }
    }

    public function responsePaypal(Request $request, Plan $plan){

        return view('payment.paypal.approved', compact('plan'));

    }

    public function approvedPaypal(Request $request, Plan $plan){

        if ($request->payment_status == "Completed") {

            $user_data = $request->custom;
            $plan_id = $request->item_number;

            $user_data =  explode('~',$user_data);
            $plan = Plan::find($plan_id);

            $user = $this->getUserData($user_data);
            $this->sendMail($user, $plan);
            $this->setUserData($user, $plan);

        }
    }

    public function approvedStripe(Request $request, Plan $plan){
        return view('payment.stripe.approved', compact('request', 'plan'));
    }

    public function setUserData(User $user, Plan $plan){

        $plan_total    = Plan::find(23);
        $fases_premium = Fase::whereIn('id', [1, 2, 3, 4])->get();
        $fase_one      = Fase::find(1);
        $week_recipes  = Fase::find(5);
        $five_recipes  = Fase::find(7);
        $fase_reto     = Fase::find(19);

        // Verificar si el usuario ya está suscrito al plan
        $alreadySubscribed = $user->subscriptions()
        ->where("plan_id", $plan->id)
        ->exists();

        if ($alreadySubscribed) {
            return response()->json(['message' => 'Usuario ya suscrito a este plan, revisa tu correo electrónico incluso en la bandeja de no deseado o Spam'], 409); // Código de estado 409 Conflict
        }

        $this->addSuscription($user->id, $plan->id);

        if($plan->id == 1 || $plan->id == 3 || $plan->id == 9 || $plan->id == 10 || $plan->id == 16 || $plan->id == 25 || $plan->id == 27 || $plan->id == 37 || $plan->id == 38 || $plan->id == 40 || $plan->id == 48) {
            $this->setFases($user->id, $fases_premium);
        }else if($plan->id == 15) { // Oferta Retos
            $this->setFases($user->id, $fases_premium);
            //$this->addSuscription($user->id, 23); // TF 24 horas
            $activeCampaignService = new ActiveCampaignService();
            $contact = $activeCampaignService->verifyOrCreateContact($user->name, $user->email);
            if ($contact) {
                $activeCampaignService->addContactToList($contact['id'], 49);
                $activeCampaignService->addContactToList($contact['id'], 66);
                $activeCampaignService->assignTagToContact($contact['id'], 44);
            }
        }elseif($plan->id == 39) {
            $this->setFases($user->id, $fases_premium);
            $this->addSuscription($user->id, $plan_total->id);
        }elseif($plan->id == 31 || $plan->id == 54 ) { // Oferta Llamadas
            $this->setFases($user->id, $fases_premium);
            $this->addSuscription($user->id, 23); // TF 24 horas
        }elseif($plan->id == 2 || $plan->id == 8) {
            if($fase_one->clients()->where('users.id', $user->id)->doesntExist()){
                $fase_one->clients()->attach($user->id);
            }
        }elseif ($plan->id == 7) {
            $this->setFases($user->id, $week_recipes);
        }elseif ($plan->id == 13) {
            $this->setFases($user->id, $five_recipes);
        }elseif ($plan->id == 53) {
            if($fase_reto->clients()->where('users.id', $user->id)->doesntExist()){
                $fase_reto->clients()->attach($user->id);
            }
            $activeCampaignService = new ActiveCampaignService();
            $contact = $activeCampaignService->verifyOrCreateContact($user->name, $user->email);
            if ($contact) {
                $activeCampaignService->addContactToList($contact['id'], 64);
                $activeCampaignService->assignTagToContact($contact['id'], 44);
            }
        }
        return true;
    }

    public function getUserData($user_data){

        $user_name = $user_data[0];
        $user_email = $user_data[1];
        $user_password = $user_data[2];
        $user_auth = $user_data[3];

        if ($user_auth == 0) {
            $user_exist = User::where('email', $user_email)->first();
            if($user_exist){
                //$user_exist->password = bcrypt($user_password);
                //$user_exist->save();
                $user = $user_exist;
            }else{
                $user = User::create([
                    'name' => $user_name,
                    'email' => strtolower($user_email),
                    'password' => bcrypt($user_password)
                ]);
            }
        }else {
            $user = User::where('email', $user_email)->first();
        }
        return $user;
    }

    public function addSuscription($user_id, $plan_id) {
        $suscription_plan           = new Subscription();
        $suscription_plan->user_id  = $user_id;
        $suscription_plan->plan_id  = $plan_id;
        $suscription_plan->save();
    }

    public function setFases($user_id, $fases) {
        foreach($fases as $fase){
            if($fase->clients()->where('users.id', $user_id)->doesntExist()){
                $fase->clients()->attach($user_id);
            }
        }
    }

    public function addWhatsApp($user_id, $days) {

        $whatsapp_subscribed = Subscription::where('user_id', $user_id)->whereIn('plan_id', array(4, 11, 12))->first();

        if($whatsapp_subscribed){
            if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays($days)]);
            }else{
                $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays($days)]);
            }
            $whatsapp_subscribed->save();
        }else{
            $suscription_whatsApp           = new Subscription();
            $suscription_whatsApp->user_id  = $user_id;
            $suscription_whatsApp->plan_id  = 4;
            $suscription_whatsApp->expires_at = \Carbon\Carbon::now()->addDays($days);
            $suscription_whatsApp->save();
        }

    }

    public function splitName($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
        return array($first_name, $last_name);
    }

    public function sendMail(User $user, Plan $plan){
        switch ($plan->id) {
            case 15:
                $mail = new ApprovedPurchase($plan, $user);
            break;
            case 53:
                $mail = new ApprovedPurchaseReto($plan, $user);
            break;
            case 55:
                $mail = new ApprovedPurchaseEvent($plan, $user);
            break;
            default:
                $mail = new ApprovedPurchaseNoChat($plan, $user);
            break;
        }
        //Mail::to($user->email)->send($mail);
        Mail::to($user->email)->bcc('correosdoctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
    }

    public function approvedHotmart(Request $request){

        $user_name = $request->post('name');
        $user_first_name = $request->post('first_name');
        $user_last_name = $request->post('last_name');
        $user_email = $request->post('email');
        $user_phone_number = $request->post('phone_checkout_number');
        $status = $request->post('status');
        $product_id = $request->post('prod');
        $product_offert = $request->post('off');

        if($status == "approved"){

            $user_exist = User::where('email', $user_email)->first();
            if($user_exist){
                $user = $user_exist;
            }else{
                $user = User::create([
                    'name' => $user_name,
                    'email' => strtolower($user_email),
                    'password' => Hash::make('123456')
                ]);
            }  
            $manyChatService = new ManyChatService();
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
            if($product_id == 2572759){ // Metodo DKP Premium
                switch ($product_offert) {
                    case 'ugs80t2l':
                        $plan = Plan::find(1); // Plan Premium $137 ahora 197,00 US$
                        $tagID = "41293479"; //Método DKP - Premium
                        break;
                    case '45ud7mhc':
                        $plan = Plan::find(15); // Plan Premium $97 ahora 147,00 US$
                        //$this->addSuscription($user->id, 23); // Total Fitness 24 Horas
                        $tagID = "41293513"; //Metodo DKP - Oferta Reto
                        break;
                    case 'u8j3n8x5':
                        $plan = Plan::find(9); // Plan Premium $110 ahora 177,00 US$
                        $tagID = "41293492"; //Método DKP - Oferta EverGreen
                        break;
                    case '0sphkasm':
                        $plan = Plan::find(31); // Plan Premium $117 ahora 167,00 US$
                        $this->addSuscription($user->id, 23); // Total Fitness
                        $tagID = "41293487"; //Método DKP - Oferta Llamadas
                        break;
                    case '6hbgake3':
                        $plan = Plan::find(54); // Plan Premium $117 ahora 167,00 US$
                        $this->addSuscription($user->id, 23); // Total Fitness
                        $tagID = "41293532"; //Método DKP - Oferta DM
                        break;
                }
                $fases = Fase::whereIn('id', [1, 2, 3, 4])->get();
                $manyChatService->processSubscriberByEmail($subscriberData, $tagID);

            }else if($product_id == 3755875){ // Método DKP EverGreen Hans
                $plan = Plan::find(9); // Plan Premium $110 ahora 177,00 US$
                $fases = Fase::whereIn('id', [1, 2, 3, 4])->get();
                $tagID = "41293492"; //Método DKP - EverGreen
                $manyChatService->processSubscriberByEmail($subscriberData, $tagID);

            }else if($product_id == 3742410){ // Reto 21 Método DKP
                $plan = Plan::find(2); 
                $fases = Fase::whereIn('id', [1])->get();
                $tagID = "41442684"; //Método DKP - Fase Uno
                $manyChatService->processSubscriberByEmail($subscriberData, $tagID);

            }else if($product_id == 3647377){ // Desafio 2024
                $plan = Plan::find(53); 
                $fases = Fase::whereIn('id', [19])->get();
                $tagID = "40709740"; //Desafio-2024
                $manyChatService->processSubscriberByEmail($subscriberData, $tagID);

            }else if($product_id == 3795223){ // MasterClass Predice Tu Enfermedad Metabólica
                $tagID = "41891887"; //MasterClass Predice Tu Enfermedad Metabólica
                $manyChatService->processSubscriberByEmail($subscriberData, $tagID);
            }
            else{
                return;
            }

            $apiKey = config('services.fomo.api_key');
            $client = new FomoClient($apiKey); // auth token

            $event = new FomoEventBasic();
            $event->event_type_id = "198607"; // Template ID
            $event->title = "Predice tu Enfermedad Metabólica";
            $event->first_name = $user_first_name;
            $event->url = "https://www.doctorbayter.com/masterclass";

            $fomoEvent = $client->createEvent($event);

            if($product_id != 3795223){
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fases);
            }   
            $this->sendMail($user, $plan);         
        }
    }
}