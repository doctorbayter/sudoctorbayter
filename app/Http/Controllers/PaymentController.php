<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\PayUService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout(Plan $plan){

        $suscription = Subscription::where('user_id', auth()->user()->id)->where('plan_id', $plan->id)->first();

        return view('payment.checkout', compact('plan', 'suscription' ));
    }


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
                    $user_id = $response['result']['payload'][0]['transactions'][0]['extraParameters']['EXTRA1'];
                    
                    $user = User::find($user_id);

                    $suscription = new Subscription();
                    $suscription->user_id = $user->id;
                    $suscription->plan_id = $plan->id;
                    $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
                    $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->first();
                    $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
                    $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
                    $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
                    $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
                    switch ($plan->id) {
                        case 1:
                            if($is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 2:
                            if($plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 3:
                            if($plan_3_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 4:
                            if($whatsapp_subscribed){

                                if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                                    $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(30)]);
                                }else{
                                    $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(30)]);
                                } 
                            }
                            else{
                                $suscription->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $suscription->save();
                            }
                        break;
                        case 7:
                            if($plan_7dias_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                    }
                }else if($response['result']['payload'][0]['status'] == "IN_PROGRESS"){
                    //
                }
            }            
        }
        $pay_data = $request;
        
        return view('payment.payu.approved', compact('plan', 'pay_data'));
    
    }

    public function approvedPayu(Request $request){
        
        if($request->state_pol == 4){
            //Log::info($request);
            $extra1 = $request->extra1;
            $extra2 = $request->extra2;

            $user = User::find($extra1);
            $plan = Plan::find($extra2);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $plan->id;
            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->first();
            $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
            $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
            $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();

            switch ($plan->id) {
                case 1:
                    if($is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 2:
                    if($plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 3:
                    if($plan_3_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 4:
                    if($whatsapp_subscribed){

                        if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                            $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(30)]);
                        }else{
                            $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(30)]);
                        } 
                    }
                    else{
                        $suscription->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $suscription->save();
                    }
                break;
                case 7:
                    if($plan_7dias_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                    }
                break;
            }
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

        $user = User::find($x_extra1);
        $plan = Plan::find($x_extra2);

        //Validamos la firma
        if ($x_signature == $signature) {
            /*Si la firma esta bien podemos verificar los estado de la transacción*/
            $x_cod_response = $request->x_cod_response;
            switch ((int) $x_cod_response) {
                case 1: 
                   // "transacción aceptada"
                    $suscription = new Subscription();
                    $suscription->user_id = $user->id;
                    $suscription->plan_id = $plan->id;
                    $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
                    $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->first();
                    $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
                    $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
                    $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
                    $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();

                    switch ($plan->id) {
                        case 1:
                            if($is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 2:
                            if($plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 3:
                            if($plan_3_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                        case 4:
                            if($whatsapp_subscribed){

                                if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                                    $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(30)]);
                                }else{
                                    $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(30)]);
                                } 
                            }
                            else{
                                $suscription->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $suscription->save();
                            }
                        break;
                        case 7:
                            if($plan_7dias_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                            }
                        break;
                    }
                break;
            }
        }
    }
  

    public function responsePaypal(Request $request, Plan $plan){

        return view('payment.paypal.approved', compact('plan'));
    
    }

    public function approvedPaypal(Request $request, Plan $plan){

        //Log::info($request);
        

        if ($request->payment_status == "Completed") {


            $user_id = $request->custom;
            $plan_id = $request->item_number;

            $user = User::find($user_id);
            $plan = Plan::find($plan_id);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $plan->id;
            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->first();
            $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
            $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
            $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();

            switch ($plan->id) {
                case 1:
                    if($is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 2:
                    if($plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 3:
                    if($plan_3_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                    }
                break;
                case 4:
                    if($whatsapp_subscribed){

                        if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                            $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(30)]);
                        }else{
                            $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(30)]);
                        } 
                    }
                    else{
                        $suscription->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $suscription->save();
                    }
                break;
                case 7:
                    if($plan_7dias_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                    }
                break;
            }
        }
    
    }

    public function prueba (){
        
    }
}