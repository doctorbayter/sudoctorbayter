<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedPurchase;
use App\Mail\ApprovedPurchaseNoChat;
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

                    $user_data =  explode('~',$response['result']['payload'][0]['transactions'][0]['extraParameters']['EXTRA1']);
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
                                'email' => $user_email,
                                'password' => bcrypt($user_password)
                            ]);
                        }
                    }else {
                        $user = User::where('email', $user_email)->first();
                    }


                    $suscription = new Subscription();
                    $suscription->user_id = $user->id;
                    $suscription->plan_id = $plan->id;
                    $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
                    $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->orWhere('plan_id', 8)->first();
                    $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
                    $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
                    $plan_8_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
                    $plan_9_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
                    $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
                    $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
                    $all_fases = Fase::where('id', '!=', 5)->get();
                    $fase_one = Fase::find(1);
                    $fase_week = Fase::find(5);


                    switch ($plan->id) {
                        case 1:
                            if($is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
                            }
                        break;
                        case 2:
                            if($plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                        break;
                        case 3:
                            if($plan_3_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                                foreach($all_fases as $fase){
                                    if($fase->id != 1){
                                     $fase->clients()->attach($user->id);
                                    }
                                }
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
                                $fase_week->clients()->attach($user->id);
                                $suscription->save();
                            }
                        break;
                        case 8:
                            if($plan_8_subscribed || $plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                        break;
                        case 9:
                            if($plan_9_subscribed || $is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
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

        if($request->state_pol == 4 ){
            //Log::info($request);
            $extra1 = $request->extra1;
            $extra2 = $request->extra2;

            $user_data =  explode('~',$extra1);
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
                        'email' => $user_email,
                        'password' => bcrypt($user_password)
                    ]);
                }
            }else {
                $user = User::where('email', $user_email)->first();
            }


            $plan = Plan::find($extra2);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $plan->id;
            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->orWhere('plan_id', 8)->first();
            $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
            $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
            $plan_8_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
            $plan_9_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
            $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
            $all_fases = Fase::where('id', '!=', 5)->get();
            $fase_one = Fase::find(1);
            $fase_week = Fase::find(5);

            switch ($plan->id) {
                case 1:
                    if($is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                break;
                case 2:
                    if($plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                break;
                case 3:
                    if($plan_3_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                        foreach($all_fases as $fase){
                            if($fase->id != 1){
                             $fase->clients()->attach($user->id);
                            }
                         }
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
                        $fase_week->clients()->attach($user->id);
                        $suscription->save();
                    }
                break;
                case 8:
                    if($plan_8_subscribed || $plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                break;
                case 9:
                    if($plan_9_subscribed || $is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            if($fase->id != 1){
                             $fase->clients()->attach($user->id);
                            }
                        }
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            if($fase->id != 1){
                             $fase->clients()->attach($user->id);
                            }
                        }
                    }
                break;
            }
            if($plan->id == 7){
                //Enviar Correo
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            }
            else{
                //Enviar Correo
                $mail = new ApprovedPurchase($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
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


        $user_data =  explode('~',$x_extra1);
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
                    'email' => $user_email,
                    'password' => bcrypt($user_password)
                ]);
            }
        }else {
            $user = User::where('email', $user_email)->first();
        }


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
                    $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->orWhere('plan_id', 8)->first();
                    $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
                    $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
                    $plan_8_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
                    $plan_9_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
                    $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
                    $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
                    $all_fases = Fase::where('id', '!=', 5)->get();
                    $fase_one = Fase::find(1);
                    $fase_week = Fase::find(5);

                    switch ($plan->id) {
                        case 1:
                            if($is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    $fase->clients()->attach($user->id);
                                }
                            }
                        break;
                        case 2:
                            if($plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                        break;
                        case 3:
                            if($plan_3_subscribed){
                                // Do nothing
                            }
                            else{
                                $suscription->save();
                                foreach($all_fases as $fase){
                                   if($fase->id != 1){
                                    $fase->clients()->attach($user->id);
                                   }
                                }
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
                                $fase_week->clients()->attach($user->id);
                                $suscription->save();
                            }
                        break;
                        case 8:
                            if($plan_8_subscribed || $plan_2_subscribed){
                                // Do nothing
                            }else if($plan_7dias_subscribed){
                                $plan_7dias_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                $fase_one->clients()->attach($user->id);
                            }
                        break;
                        case 9:
                            if($plan_9_subscribed || $is_subscribed){
                                // Do nothing
                            }else if($previous_subscribed){
                                $previous_subscribed->delete();
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    if($fase->id != 1){
                                     $fase->clients()->attach($user->id);
                                    }
                                 }
                            }
                            else{
                                $suscription->save();
                                $whatsApp30 = new Subscription();
                                $whatsApp30->user_id = $user->id;
                                $whatsApp30->plan_id = 4;
                                $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                                $whatsApp30->save();
                                foreach($all_fases as $fase){
                                    if($fase->id != 1){
                                     $fase->clients()->attach($user->id);
                                    }
                                 }
                            }
                        break;
                    }

                    if($plan->id == 7){
                        //Enviar Correo
                        $mail = new ApprovedPurchaseNoChat($plan, $user);
                        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    }
                    else{
                        //Enviar Correo
                        $mail = new ApprovedPurchase($plan, $user);
                        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
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


            $user_data = $request->custom;
            $plan_id = $request->item_number;

            $user_data =  explode('~',$user_data);
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
                        'email' => $user_email,
                        'password' => bcrypt($user_password)
                    ]);
                }
            }else {
                $user = User::where('email', $user_email)->first();
            }


            $plan = Plan::find($plan_id);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $plan->id;
            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->orWhere('plan_id', 7)->orWhere('plan_id', 8)->first();
            $plan_2_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
            $plan_3_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 3)->first();
            $plan_8_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
            $plan_9_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 4)->first();
            $plan_7dias_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
            $all_fases = Fase::where('id', '!=', 5)->get();
            $fase_one = Fase::find(1);
            $fase_week = Fase::find(1);


            switch ($plan->id) {
                case 1:
                    if($is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                break;
                case 2:
                    if($plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                break;
                case 3:
                    if($plan_3_subscribed){
                        // Do nothing
                    }
                    else{
                        $suscription->save();
                        foreach($all_fases as $fase){
                            if($fase->id != 1){
                             $fase->clients()->attach($user->id);
                            }
                         }
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
                        $fase_week->clients()->attach($user->id);
                        $suscription->save();
                    }
                break;
                case 8:
                    if($plan_8_subscribed || $plan_2_subscribed){
                        // Do nothing
                    }else if($plan_7dias_subscribed){
                        $plan_7dias_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        $fase_one->clients()->attach($user->id);
                    }
                break;
                case 9:
                    if($plan_9_subscribed || $is_subscribed){
                        // Do nothing
                    }else if($previous_subscribed){
                        $previous_subscribed->delete();
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    else{
                        $suscription->save();
                        $whatsApp30 = new Subscription();
                        $whatsApp30->user_id = $user->id;
                        $whatsApp30->plan_id = 4;
                        $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                        $whatsApp30->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    }
                break;
            }

            if($plan->id == 7){
                //Enviar Correo
                $mail = new ApprovedPurchaseNoChat($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            }
            else{
                //Enviar Correo
                $mail = new ApprovedPurchase($plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            }

        }

    }


}
