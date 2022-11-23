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
use App\Services\PayUService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $fase_one      = Fase::where('id', [1])->get();
        $week_recipes  = Fase::where('id', [5])->get();
        $five_recipes  = Fase::find(7);
        $fase_reto     = Fase::find(14);

        $already_subscribed  = $user->subscriptions()->where(["plan_id" => $plan->id])->first();

        if($already_subscribed){
            return;
        }

        $this->addSuscription($user->id, $plan->id);

        if($plan->id == 1 || $plan->id == 3 || $plan->id == 9 || $plan->id == 10 || $plan->id == 15 || $plan->id == 16 || $plan->id == 25 || $plan->id == 27 || $plan->id == 31 || $plan->id == 37 || $plan->id == 38 || $plan->id == 40 ) {
            $this->setFases($user->id, $fases_premium);
        }elseif($plan->id == 39) {
            $this->setFases($user->id, $fases_premium);
            $this->addSuscription($user->id, $plan_total->id);
        }elseif($plan->id == 2 || $plan->id == 8) {
            if($fase_one->clients()->where('users.id', $user->id)->doesntExist()){
                $fase_one->clients()->attach($user->id);
            }
        }elseif ($plan->id == 7) {
            $this->setFases($user->id, $week_recipes);
        }elseif ($plan->id == 13) {
            $this->setFases($user->id, $five_recipes);
        }elseif ($plan->id == 47) {
            if($fase_reto->clients()->where('users.id', $user->id)->doesntExist()){
                $fase_reto->clients()->attach($user->id);
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

    public function activeCampaign($name, $email, $list_id) {

        $response = Http::withHeaders([
            'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
        ]);

        $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
            "email" => $email,
            "orders[email]" => "ASC"
        ]);

        if($getUserByEmail){
            $userData = $getUserByEmail['contacts'];
        }else{
            $userData = null;
        }

        if($userData){
            $userListsLink = $userData[0]['links']['contactLists'];
            $userId = $userData[0]['id'];
        }else{

            //$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            //$first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );

            $addUser = $response->POST('https://doctorbayter.api-us1.com/api/3/contacts',[
                "contact" => [
                    "email" => $email,
                    "fullName" => trim($name),
                ]
            ]);
            $userListsLink = $addUser['contact']['links']['contactLists'];
            $userId = $addUser['contact']['id'];
        }

        $getUserLists =  $response->GET($userListsLink);
        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {

            foreach($userLists as $userList ) {
                if($userList['list'] == $list_id){

                    if($userList['status'] == "2") {
                        $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $list_id,
                                "contact" => $userId,
                                "status" => 1,
                                "sourceid" => 4
                            ]
                        ]);
                    }
                    break;
                }else{
                    $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                        "contactList" => [
                            "list" => $list_id,
                            "contact" => $userId,
                            "status" => 1
                        ]
                    ]);
                }
            }

        }else{
            $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                "contactList" => [
                    "list" => $list_id,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
        }

        return;
    }

    public function sendMail(User $user, Plan $plan){
        switch ($plan->id) {
            case 7:
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 20:
                $mail = new ApprovedPurchaseEvent($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 23:
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 47:
                $mail = new ApprovedPurchaseReto($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 41:
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            default:
                $mail = new ApprovedPurchase($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
        }
    }

    public function approvedHotmart(Request $request){

        $user_name = $request->post('name');
        $user_email = $request->post('email');
        $user_phone = $request->post('phone_checkout_local_code');
        $status = $request->post('status');
        $product_id = $request->post('prod');

        if($status == "approved"){

            $user_exist = User::where('email', $user_email)->first();

            if($user_exist){
                $user = $user_exist;
            }else{
                $user = User::create([
                    'name' => $user_name,
                    'email' => strtolower($user_email),
                    'password' => Hash::make('secret')
                ]);
            }

            if($product_id == 00000){
                $plan = Plan::find(47); //Reto #QuedeseKeto 2022
                $fase = Fase::find(14);
            }else{
                return;
            }

            $this->addSuscription($user->id, $plan->id);
            if($fase->clients()->where('users.id', $user->id)->doesntExist()){
                $fase->clients()->attach($user->id);
            }
            //$this->sendMail($user, $plan);

        // $data = $request->json()->all();
        // $id = $data['data']['product']['id'];
        // $email = $data['data']['buyer']['email'];
        // return $email;

        }
    }
}
