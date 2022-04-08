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
            $this->setUserData($user, $plan);
            $this->sendMail($user, $plan);
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
                    $this->setUserData($user, $plan);
                    $this->sendMail($user, $plan);
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
            $this->setUserData($user, $plan);
            $this->sendMail($user, $plan);

        }
    }

    public function approvedStripe(Request $request, Plan $plan){
        return view('payment.stripe.approved', compact('request', 'plan'));
    }

    public function setUserData(User $user, Plan $plan){

        $is_already_subscribed      = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
        $previous_plan_premium      = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(2, 7, 8))->first();
        $previous_plan_selecto      = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 7, 8, 9, 10, 15, 16, 17))->first();
        $previous_plan_week         = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 8, 9, 10, 15, 16))->first();
        $previous_desafio           = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 7, 8, 9, 10, 15, 16, 17))->first();
        $previous_empareja2         = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 7, 8, 9, 10, 15, 16, 17, 18))->first();
        $subscribed_plan_1          = Subscription::where('user_id', $user->id)->where('plan_id', 1)->first();
        $subscribed_plan_2          = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
        $subscribed_plan_7          = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
        $subscribed_plan_8          = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
        $subscribed_plan_9          = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
        $subscribed_plan_10         = Subscription::where('user_id', $user->id)->where('plan_id', 10)->first();
        $fases_premium              = Fase::whereIn('id', array(1, 2, 3, 4))->get();
        $fase_one                   = Fase::find(1);
        $fase_week                  = Fase::find(5);
        $five_recipes               = Fase::find(7);
        $keto_navidad               = Fase::find(8);
        $fase_desafio               = Fase::find(9);
        $fase_empareja2             = Fase::find(10);

        if(!$is_already_subscribed){
            switch ($plan->id) {
                case 1:
                    if($previous_plan_premium){
                        $previous_plan_premium->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    break;
                case 2:
                    if($subscribed_plan_7){
                        $subscribed_plan_7->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    if(!$fase_one->clients->contains($user->id)){
                        $fase_one->clients()->attach($user->id);
                    }
                    break;
                case 3:
                    if($subscribed_plan_2){
                        $subscribed_plan_2->delete();
                    }else if($subscribed_plan_8){
                        $subscribed_plan_8->delete();
                    }
                    $this->addSuscription($user->id, 1);
                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    break;
                case 4:
                    $this->addWhatsApp($user->id, 30);
                    break;
                case 7:
                    if(!$previous_plan_week){
                        $this->addSuscription($user->id, $plan->id);
                    }
                    if(!$fase_week->clients->contains($user->id)){
                        $fase_week->clients()->attach($user->id);
                    }
                    break;
                case 8:
                    if($subscribed_plan_7){
                        $subscribed_plan_7->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    if(!$fase_one->clients->contains($user->id)){
                        $fase_one->clients()->attach($user->id);
                    }
                    break;
                case 9:
                    if($previous_plan_premium){
                        $previous_plan_premium->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    break;
                case 10:
                    if($previous_plan_selecto){
                        $previous_plan_selecto->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 60);

                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    break;
                case 11:
                    $this->addWhatsApp($user->id, 90);
                    break;
                case 12:
                    $this->addWhatsApp($user->id, 180);
                    break;
                case 13:
                    if(!$five_recipes->clients->contains($user->id)){
                        $five_recipes->clients()->attach($user->id);
                    }
                    break;
                case 15:
                    if($previous_plan_premium){
                        $previous_plan_premium->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 45);

                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }

                    // if(!$five_recipes->clients->contains($user->id)){
                    //     $five_recipes->clients()->attach($user->id);
                    // }

                    // if(!$fase_week->clients->contains($user->id)){
                    //     $fase_week->clients()->attach($user->id);
                    // }

                    break;
                case 16:
                    if($subscribed_plan_7){
                        $subscribed_plan_7->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    if(!$fase_one->clients->contains($user->id)){
                        $fase_one->clients()->attach($user->id);
                    }
                    if(!$five_recipes->clients->contains($user->id)){
                        $five_recipes->clients()->attach($user->id);
                    }

                    if(!$fase_week->clients->contains($user->id)){
                        $fase_week->clients()->attach($user->id);
                    }
                    break;
                case 18:
                    if(!$previous_desafio){
                        $this->addSuscription($user->id, $plan->id);
                    }
                    if(!$fase_desafio->clients->contains($user->id)){
                        $fase_desafio->clients()->attach($user->id);
                    }
                    break;
                case 19:
                    if(!$previous_empareja2){
                        $this->addSuscription($user->id, $plan->id);
                    }
                    if(!$fase_empareja2->clients->contains($user->id)){
                        $fase_empareja2->clients()->attach($user->id);
                    }
                    break;
                case 20:
                        $this->addSuscription($user->id, $plan->id);
                    break;
                case 21:
                        $this->addSuscription($user->id, $plan->id);
                    break;
                case 22:
                        $this->addSuscription($user->id, $plan->id);
                    break;
                case 25:
                    if($previous_plan_premium){
                        $previous_plan_premium->delete();
                    }
                    $this->addSuscription($user->id, $plan->id);
                    $this->addWhatsApp($user->id, 30);

                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    break;
            }
        }

        if($plan->id != 19){
            $this->activeCampaign($user->email, 18);
        }else if($plan->id != 3 || $plan->id != 4 || $plan->id != 5 || $plan->id != 6 || $plan->id != 7 || $plan->id != 11 || $plan->id != 12 ){
            $this->activeCampaign($user->email, 16);
        }
    }

    public function getUserData($user_data){

        $user_name = $user_data[0];
        $user_email = $user_data[1];
        $user_password = $user_data[2];
        $user_auth = $user_data[3];

        if ($user_auth == 0) {
            $user_exist = User::where('email', $user_email)->first();
            if($user_exist){
                $user_exist->password = bcrypt($user_password);
                $user_exist->save();
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

    public function activeCampaign($email, $list_id) {

        $response = Http::withHeaders([
            'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
        ]);
        $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
            "email" => $email,
            "orders[email]" => "ASC"
        ]);
        $userData = $getUserByEmail['contacts'];

        if(!$userData){
            return ;
        }

        $userListsLink = $userData[0]['links']['contactLists'];
        $userId = $userData[0]['id'];

        $getUserLists = $response->GET($userListsLink);

        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {

            foreach($userLists as $userList ) {

                if($userList['list'] == $list_id){

                    if($userList['status'] == 1){
                       return false;
                    }else if($userList['status'] == "2") {
                        $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $list_id,
                                "contact" => $userId,
                                "status" => 1,
                                "sourceid" => 4
                            ]
                        ]);
                    }
                    return true;
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
            return true;

        }else{
            $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                "contactList" => [
                    "list" => $list_id,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
            return true;
        }
    }

    public function sendMail(User $user, Plan $plan){
        switch ($plan->id) {
            case 7:
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 19:
                $mail = new ApprovedPurchaseReto($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 20:
                $mail = new ApprovedPurchaseEvent($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 21:
                $mail = new ApprovedPurchaseEvent($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            case 22:
                $mail = new ApprovedPurchaseEvent($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            break;
            default:
                $mail = new ApprovedPurchase($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                break;
        }
    }
}
