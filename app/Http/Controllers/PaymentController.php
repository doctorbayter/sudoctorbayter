<?php

namespace App\Http\Controllers;

use App\Models\Fase;
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
        
        if($request->state_pol == 4 ){
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
            $all_fases = Fase::all();
            $fase_one = Fase::find(1);

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
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
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
                    $all_fases = Fase::all();
                    $fase_one = Fase::find(1);

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
                                $fase_one->clients()->attach($user->id);
                            }
                            else{
                                $suscription->save();
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
            $all_fases = Fase::all();
            $fase_one = Fase::find(1);
            
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
                        $fase_one->clients()->attach($user->id);
                    }
                    else{
                        $suscription->save();
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
                        $suscription->save();
                    }
                break;
            }
        }
    
    }

    public function faseuno (){
        $user = User::create([ 'name' => 'Maria Mercedes González', 'email' => 'mercepego@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marilady Gonzalez', 'email' => 'mariladyg@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angela Valencia', 'email' => 'dgangelavalencia@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Viviana Rueda', 'email' => 'viparuro11@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Luz Leal', 'email' => 'lealrluz@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angelina Cardenas', 'email' => 'angelinacardenas@live.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Wendy Arizmendi', 'email' => 'dra_wendy1504@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Juliana Vargas', 'email' => 'julianavargasmd2010@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gladys Alexandra Espitia', 'email' => 'jucet@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Timisay Monsalve', 'email' => 'timisaymonsalve@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gaston Jesus Pascual', 'email' => 'gastonpascual@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Patricia Hernández', 'email' => 'daliapatriciah@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Massai Torres', 'email' => 'massai90@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Fabiola Bernal', 'email' => 'fabiolabernalgarcia@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Del Mar Duque', 'email' => 'mariadelmard@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Esther Herrera Gordon', 'email' => 'lieshego20@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Benjamin Jaime Lopez Palazuelos', 'email' => 'drjimmylopezp@hotmail.con', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Zaida Sadde', 'email' => 'zsadde@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Benjamin Jaime Lopez Palazuelos', 'email' => 'drjimmylopezp@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gabriel Lima', 'email' => 'glima9600@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yeimy Martínez', 'email' => 'yeiminiampira@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Claudia Andrea Aramburu', 'email' => 'dalilaprato@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Vic', 'email' => 'ana.casanueva22@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sonia Guio', 'email' => 'marcelaguio@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Suri Alky Moreno Frias', 'email' => 'sego.serviciosgourmet@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Noura El Amrani', 'email' => 'noura62@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ammi Santiago', 'email' => 'ammi.santiago@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Edinson Reyes', 'email' => 'oraclito@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Teresa Guerrero García', 'email' => 'dratere@neoplastic.com.mx', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Margaret Peralta', 'email' => 'mphdfp@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yohana Cadena Rosero', 'email' => 'yohanacadenar22@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angel Duran', 'email' => 'agelduran@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Débora Zencich', 'email' => 'debzencich@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Martín Buraglia', 'email' => 'martinburaglia@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Franchesca Lucas Campos', 'email' => 'pa-luca@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Elaine Hansen', 'email' => 'elaine@tensarte.com.br', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mayra Bojorquez', 'email' => 'mayrabojorquez@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Nelly Juarez', 'email' => 'nelly.j.v@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jorge Elías Ayala Buelvas', 'email' => 'jorgeliasayala@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marcela Paton', 'email' => 'deyvapaton@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Enrique Parra Ramirez', 'email' => 'jeparra@colectivosh.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jazmin Ramirez', 'email' => 'jazmina1216@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Chirley Areiza', 'email' => 'jhorshi82@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marcela Garcia', 'email' => 'marcelagarciavera@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jennifer Ruano', 'email' => 'jenniferruano5@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marggie Blanco', 'email' => 'mblanco@somosgcc.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alba Lucero Caceres', 'email' => 'albaluceroc@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jorge Luquetta', 'email' => 'jluquettagarcia@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jesus Arturo De Los Santos Lopez', 'email' => 'yoarturo1989@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Kathly Duarte', 'email' => 'duartealtahonakathlyn@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Bartolome Lewis', 'email' => 'barthylewis@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jotzabel Ventura', 'email' => 'jotzabelv@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Juan Martin Blanco Riveros', 'email' => 'jmblanco282@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Giovanna Maria Villamizar Real', 'email' => 'giovavillamizar@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Pamela Zuleta', 'email' => 'pamelazuletam@yahoo.com.co', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Michell Rodriguez', 'email' => 'karmich46@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Liz Flores', 'email' => 'liz.stefaniagonzalez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Esperanza Puerta-iniguez', 'email' => 'esperanza_puerta@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Teresa Montoto', 'email' => 'audielegancia@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yenifer Tatiana Serrano González', 'email' => 'tatiana.serrano.gonzalez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Keven Rodriguez', 'email' => 'keveliasrod@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Diana Posada', 'email' => 'dianapo04@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lina Añez', 'email' => 'lina@parquesinfantilesdecolombia.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Erica Schaeffer', 'email' => 'dra.vetsandpets@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alexandra Mendoza', 'email' => 'mendozagomez989@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Verónica Rambaldi', 'email' => 'veronicarambaldi@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Vanessa Jabba', 'email' => 'vanejabba@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Valente Garcia', 'email' => 'ponke123@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Eugenia Calvillo Alamilla', 'email' => 'dra.eugeniacalvillo@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sandra Patricia Valenzuela Vanegas', 'email' => 'sandritavalenzuela@yahoo.es', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Arturo Selvas Moreno', 'email' => 'arturo.selvas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Catherine Espaillat', 'email' => 'catherine.espaillat@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Avellaneda', 'email' => 'viav1234@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Javier Zubillaga', 'email' => 'hormigaz88@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jocelyn Del Risco', 'email' => 'jocelyndelrisco@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gabriela Cuadra Cárpio', 'email' => '28691gecuadra23@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Verónica García', 'email' => 'verona.garp@yahoo.com.mx', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ya’el Leon', 'email' => 'yaeleon74@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Myriam Aida Parra Amar', 'email' => 'mrsart331@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'María Fernanda Carvajal Ayala', 'email' => 'fernandacarvajalayala@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Inés Sant', 'email' => 'ines.santc@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jahaira Uribe', 'email' => 'jahaira90@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Juliana Castaño', 'email' => 'julianacastano_5@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Cris González', 'email' => 'crisgonzalezar@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rafael Saavedra', 'email' => 'rafael.saavedra.armero@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Abilys Napier', 'email' => 'abilys@live.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Monica Guevara', 'email' => 'administracion@guevarasport.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alejandra Pelaez', 'email' => 'pelaez.alejandra@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mauricio Garcia', 'email' => 'doctoredgarmauricio@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jesus Tirado', 'email' => 'jesus_tirado21@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Erika Vargas', 'email' => 'lolamejia46@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Arnaldo Gutiérrez', 'email' => 'arnaldo.gutierrez.r@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Cinthya Najar', 'email' => 'cinthyanajartrejo@outlook.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mary Ramirez', 'email' => 'maryluzramirez17@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Eugenia Jaime', 'email' => 'mariaeugeniajaime@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angelica Jimenez Lizcano', 'email' => 'ajlizcano@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Eleonora Scavone', 'email' => 'escavone@bepsa.com.py', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Guayo Gutierrez', 'email' => 'eduardogdev@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yolanda Landinez Tellez', 'email' => 'ylandineztellez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Llanes', 'email' => 'llanes.vicky@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Mercedes Barrios Borrero', 'email' => 'mariamer1980@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Liliana Russo', 'email' => 'lilianarussobravo@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Katerin Trujillo', 'email' => 'ladysss.2015@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carolina Vasquez Delgado', 'email' => 'cvasquezd2011@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Eliana Castañeda', 'email' => 'elicmarin@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mariana Cantor', 'email' => 'marianacantorp@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marina Mmg', 'email' => 'mmalvidg@yahoo.es', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Anna Pena Casanovas', 'email' => 'annapena63@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Fernanda Romo', 'email' => 'nanndaromo@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Iris Gruber', 'email' => 'irisgruber2011@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Consuelo Arango', 'email' => 'casamto@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Ballesteros', 'email' => 'anyballesteros@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Luna', 'email' => 'marialuna92@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Jose Morocho Plaza', 'email' => 'majo_mp88@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Andres Rodriguez', 'email' => 'andresrodriguezramos@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gabriela Raqxon', 'email' => 'gabrielarascon.g@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mary Cooper', 'email' => 'maryc00per@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Esmeralda Juarez', 'email' => 'formacion.empleate@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Berenice Novoa Gonzalez', 'email' => 'berenovoag@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lurarle Gonzalez', 'email' => 'gonzalezlurarle@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lorena Bejarano ', 'email' => 'lorebejarano2010@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Claudia Castejónn Font ', 'email' => 'castejonclaudia7@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sandra Sierra', 'email' => 'sandrapatriciasierra@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Giulia Del Mastro', 'email' => 'giuliadelmastrogutierrez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yanet Vargas', 'email' => 'yanet0512@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Liliana Gomez', 'email' => 'liligomez66@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Paola Mena', 'email' => 'cadadiaconamor@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Pamela Silva', 'email' => 'pamela.silva.carmona@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Fanny Martinez', 'email' => 'fannymartinezalfaro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Arturo Fernández ', 'email' => 'fernandez.telde@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Roberto Moreno', 'email' => 'roberto.moreno@globalsynergy.co', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Beatriz Chalate', 'email' => 'beatrizchalate@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Solange Roa', 'email' => 'roafuentes@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Leidy Florez', 'email' => 'gerenciamediclub@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alba Ramirez', 'email' => 'albamaramirez@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Katia Villalobos', 'email' => 'katia@gfernandez.net', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Vanessa Carrero', 'email' => 'vajucaru@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jorge Cabaleiro', 'email' => 'jorgecabaleirod@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Nela Rad', 'email' => 'kellyaksa@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jessica Lastra', 'email' => 'jessicalastra_22@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Sevilla Navarro', 'email' => 'csevillanavarro@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Eduardo Gomez', 'email' => 'egomez@oceanicaereo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Silvia Feldmann', 'email' => 'sil.c.feldmann@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marta Cock', 'email' => 'martacocklopez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Erika Arellano ', 'email' => 'erikaare82@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carlos Pérez Pacheco ', 'email' => 'deivid_137@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Liliana Serna ', 'email' => 'lirosesa@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carolina Fajardo', 'email' => 'fajigom@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Hugo Francisco Bahamon', 'email' => 'hugobah@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jimmy Mencias', 'email' => 'jimmymencias@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Zuly Marcela Vega Alvarino', 'email' => 'zullyvega14@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Augusta Pirone', 'email' => 'dra.pirone@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Suarez', 'email' => 'madisuzi@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Conny Sanudo', 'email' => 'connysanudo@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Soledad Sampen', 'email' => 'mariasampen@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Alejandra Rodriguez Perez', 'email' => 'male1019@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gustavo Pinto', 'email' => 'motocentto.ventas@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Belinda Herrera Reyna', 'email' => 'herrera_belinda@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jessica Vasquez', 'email' => 'jessi.vasquezl@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alberto Duque', 'email' => 'albertoduqueramirez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Hernan Dario Arbelaez Sanchez ', 'email' => 'arbelaezhyc@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maiyeris Marquez ', 'email' => 'maiyerislobaina@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Leidy Trimaldi', 'email' => 'leidytrimaldi123@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Patticia Villamizar Vera', 'email' => 'pavive1569@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gloria Esther Alvarado', 'email' => 'gloriafalcon71@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Adela Diaz', 'email' => 'adediazromero@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Monica Ricaurte', 'email' => 'monikgigo25@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sandra Vieda', 'email' => 'naziravieda@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Isabella Perez', 'email' => 'isabellaperez31@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rafael Rossi', 'email' => 'od.rafaelrossi@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Fabiola Cordova', 'email' => 'fabycordoval@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yamile Romero', 'email' => 'yastrid.romero@gmil.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Emilia Pérez', 'email' => 'elascarro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alejandra Zambrano', 'email' => 'azambrano1510@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Cristina Andrada ', 'email' => 'cristina_andrada@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Arianna Garcia', 'email' => 'ariannayoguini@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Juliana Reina', 'email' => 'majulianareina@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maribel Bedoya C ', 'email' => 'marybelbedoya@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Tapanes ', 'email' => 'tapanesana@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Beacho', 'email' => 'maba333@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Aide Guzman', 'email' => 'aideguzmam302@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Emma Burgos ', 'email' => 'emmaburgoscalvino@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Glennys Nunez Casso ', 'email' => 'dra.casso@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Julio Cesar Meza', 'email' => 'mezajuliocesar@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rocio Pomiano Pomiano', 'email' => 'rociopomiano@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mariela Perez', 'email' => 'marielaperez30@yahoo.com.ar', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Klaudia Davis', 'email' => 'zamoraklaudia@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Deyanira Novoa', 'email' => 'deyaniranr77@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Isabel Corena Angarita', 'email' => 'isabelcorena36@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lola Blue', 'email' => 'bluelola260@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Montano', 'email' => 'smontano@uabc.edu.mx', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alicia Bareiro', 'email' => 'ali.bareiro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gaby Aguiar', 'email' => 'gabyaguiarv@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marisol Hernandez', 'email' => 'mhbeetle@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Loreto Magallon', 'email' => 'marilomagallonquemada@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Natalia Tarazona', 'email' => 'nataliatarazonap@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alejandra Moreira Vera', 'email' => 'mayra_mv5@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lili Cruz', 'email' => 'yolandalemus@12icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Katherine Puerto', 'email' => 'psicokatherinepuerto@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Merle Yuridia Carrasco Dominguez', 'email' => 'merleyer3@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Camila De Marco', 'email' => 'kamidetierra@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Martha Burbano', 'email' => 'marthalu1216@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Estévez', 'email' => 'anavictoriaestevez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Claudia Acst', 'email' => 'daiana_leandro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mariana Dogliolo', 'email' => 'marianadogliolo8@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lily Cruz', 'email' => 'yolandalemus12@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Stella Zemlin', 'email' => 'stella.zemlin@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sandra Algamitas', 'email' => 'sandraalgamitas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Valentina González', 'email' => 'valenkallisti17@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Laura Castañeda', 'email' => 'laucas2004@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angela Ospina', 'email' => 'angelaospinap@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Leonel Paz', 'email' => 'pingicuba@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Karen Ponce', 'email' => 'karencitaponce1588@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Francisca Magdalena Salcido Lucero', 'email' => 'magdasalcido@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alba Iris Grajales', 'email' => 'tazmania7934@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Francisco Dabike', 'email' => 'fcodabike73@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Johanna Jonquet', 'email' => 'jonquet89@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Karen Alonso', 'email' => 'karen.alonso@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana González', 'email' => 'ssannalyyy@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Isabella Herreno', 'email' => 'isabellaherreno@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Luciana Ruiz Freyre ', 'email' => 'luufreyre@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Muñoz', 'email' => 'carine20@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mónica Ruiz Villada', 'email' => 'mnkruiz@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Geral Jimenez', 'email' => 'geraljr2004@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'María Alejandra Pinillos', 'email' => 'sandritapalacios90@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Georgette Barrera', 'email' => 'geobarrtov@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rosalba Gomez', 'email' => 'gomez123rb@aol.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Silvia Simieli', 'email' => 'silviasimieli@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sibit Sosa Valverde ', 'email' => 'sibitsv@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Diana Ochoa', 'email' => 'diana.ochoa830@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ladys Barillas', 'email' => 'ladysbarillas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Cecilia Gutiérrez Ricárdez ', 'email' => 'cecilu.rica@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ariel Garcia ', 'email' => 'ariel.josue.garcia@icloud.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Zoila Bastidas', 'email' => 'emperatriz_614@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alejandro Dulcich', 'email' => 'alejandrodulcich@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Elvia Beatriz Novoa Rodriguez', 'email' => 'beatriznovoa1811@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Monica Castro Parra', 'email' => 'mcastro11@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Guillermina Gutierrez Lara ', 'email' => 'minaggl@yahoo.com.mx', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lisbeth Moreira', 'email' => 'lisbethmoreira@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Paola Martino', 'email' => 'paolamartino91@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Nestor Montero', 'email' => 'nestormon@arnet.com.ar', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Elena Castañeda', 'email' => 'nube_118@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yolanda Pazos', 'email' => 'yolanda_blancopazos@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Emilsa Izquierdo', 'email' => 'emilsaizq@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Xiomara Centeno', 'email' => 'xiocenteno10@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Catalina Lucia', 'email' => 'asperezaamador@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marlin Lilley Chaverra Henao', 'email' => 'marlinlilley@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Isabel Guerrero', 'email' => 'viemai@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Tania Velasquez', 'email' => 'taniaalejandra50890@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yeidy Carrillo', 'email' => 'yeidyastrid@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Arnaldo Coronado', 'email' => 'coronadovargas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Lida Orejuela', 'email' => 'orejuelaorejuelaanalida@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Leslie Astudillo', 'email' => 'leslie_galgo9@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alfredo Villapol', 'email' => 'alfredovillapol@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mery Izaguirre', 'email' => 'mestar828@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Castro', 'email' => 'anniecastro1001@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Diamantina Rodriguez', 'email' => 'despinoza0820@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rebeca Palacios', 'email' => 'damalagoinfo@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Diana Perez', 'email' => 'diana0316@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Adriana Palacios', 'email' => 'palaciosadriana001@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Concepcion Lopez Lopez', 'email' => 'conchis1968.cl@goil.com214', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Tamara Davice', 'email' => 'pedidosvhtd@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marylu Rivera', 'email' => 'marylurivera27@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Veronica Hurtado', 'email' => 'reboltosa@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Pamela Borda', 'email' => 'pamelaborda@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Martha Fregoso', 'email' => 'marfregosomtz@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Pino Martos', 'email' => 'pinomartos3@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Niloha Rangel ', 'email' => 'rangel.niloha@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alvaro Jose Mendez Navarro', 'email' => 'alvaromendezn@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Telma Acosta ', 'email' => 'carla8300@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Jose Pineda Garcia', 'email' => 'pinedagarcia.mjos@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yessica Diaz', 'email' => 'yessica.sosa.diaz@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Dalbenzio ', 'email' => '4languages@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'David Ordoñez', 'email' => 'antoniocordero21@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Zaira Flores', 'email' => 'zairaffaour@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carlos Lizcano', 'email' => 'lizcano75@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Patricia Arenas', 'email' => 'patricianicolleaz@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Pablo Márquez', 'email' => 'pmarqueze@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'David Moreno', 'email' => 'nano1906@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Laura Marquez', 'email' => 'lauramarquez13@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Orozco', 'email' => 'car', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Vanesa Koziol', 'email' => 'vanesa_koziol04@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'David Betancur ', 'email' => 'estefaniaescobar85@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Adrimar Hall ', 'email' => 'adrinikolee@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carles Collell Canal', 'email' => 'kacollell@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana Marcela Herrera', 'email' => 'mayra1964@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Garcia', 'email' => 'carmengarcia6373@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mónica María Guerrero Orozco', 'email' => 'mguerrero.0623@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Katalina Castro', 'email' => 'katacastro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Patricia Escobar', 'email' => 'patriciaescobargil@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Eric Emmanuel Jimenez Ramos ', 'email' => 'erem53@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Iris Nadis Herrera Bravo ', 'email' => 'irisherrerab13@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Suleyma Ibarguen Palacios', 'email' => 'su-ley23@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Natalia Carvajal álvarez', 'email' => 'natalia.carvajal.a@gmail', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alessia Saenz', 'email' => 'alessiasaenz00@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Scarlet Valoz', 'email' => 'skr_oasis@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marietta Cruz Cuba', 'email' => 'marietta.cuba@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rutliani Morillo ', 'email' => 'morillorutliani@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alma Lopez ', 'email' => 'coronelalma@live.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Rosa Cuello', 'email' => 'ochicuello@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sheyla Azuero', 'email' => 's.azuero@andrelaurent.com.co', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Betty Catherinne Vega Caicedo ', 'email' => 'bettyvega5451@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lilian Roman', 'email' => 'romanlilian47@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Paula Fonseca ', 'email' => 'fonseca.paulam@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Flores ', 'email' => 'belenflores0405@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Eric Emmanuel Jumenez Ramos', 'email' => 'erem53@hotmaim.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yleana Torres Ferra', 'email' => 'yle25@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Paola Restrepo', 'email' => 'pao.restrepo.30@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Del Mar Hidalgo Pérez ', 'email' => 'mariagimenezmontreal@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yeinnu Garxia', 'email' => 'yeinny2@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Vero Marin', 'email' => 'krysthamarvivanco2@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lila Guerra', 'email' => 'margaritaguerrae@yahoo.es', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yurley Do Campo', 'email' => 'yurley.docampo.ydc@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sabrina Flores', 'email' => 'tabiflores1@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Iris Klein', 'email' => 'ieloira66@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yesenia Aponte ', 'email' => 'yeseniaaponte718@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Antonia Sansaloni Gomez Sansaloni Gomez', 'email' => 'antoniasansalonigomez46@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Eleida Gelves Sanchez', 'email' => 'eleidagalvez@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Katiuscia Rosado', 'email' => 'katiusciarosado@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jennifer Dominguez', 'email' => 'gerencia@manselsas.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Vivian Arce ', 'email' => 'vvnrcpnd@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Sandy Velasco Méndez', 'email' => 'corpoandesadmon@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Estrella Faundez', 'email' => 'star.faundez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Mariela Gimenez', 'email' => 'marielagimenez9@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angeline Paola Pulido Fernandez', 'email' => 'angelineppulidof@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Valeria Vargas Low', 'email' => 'valeriavlow@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Corin Florez', 'email' => 'corinaflorezp@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gimena Arambarri', 'email' => 'gimenaarambarri@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Magdala Ruiz', 'email' => 'magdalaruiz@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Anamaria Rojas', 'email' => 'anyrojass@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Diosa Arevalo', 'email' => 'diosamilena.ag@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Marta Lucía Jiménez', 'email' => 'marthicajimenez67@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Karla Faiz', 'email' => 'karla_faiz@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Natacha Baez ', 'email' => 'natacha.baez@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Juan Bohorquez', 'email' => 'juan.bohorquez@surepack.us', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alberto Sanchez', 'email' => 'lupito4722@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carolina Navarro', 'email' => 'anacarolinanavarro@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Alvaro Javier Uribe Riobo', 'email' => 'uribealvarojavier@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'María Solano ', 'email' => 'mapazsolano@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Yane Harnandez', 'email' => 'yanealex2006@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Zuleyma Alzate', 'email' => 'zuleymaalzate@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angelica Lizzeth Bustamante Santiago ', 'email' => 'busa181282@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Paola Chawes', 'email' => 'paitochawez@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Luz Miryan Pérez Acevedo ', 'email' => 'luzmi2210@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Angela Lara Moreira', 'email' => 'angelalaramoreira@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ana María Soriano Bonilla', 'email' => 'mxbyncml@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Milagros Pineda', 'email' => 'millypvargas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Enriqueta C Muller', 'email' => 'enriqueta_muller@yahoo.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gabriela Meaurio', 'email' => 'gabriela.maricel@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lorelys Zamora ', 'email' => 'lorelyszamora95@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Camila Robayo ', 'email' => 'calerobayo@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Karla Palacios Martos', 'email' => 'carlaestefany1@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Jacqueline Ardila', 'email' => 'jaarpa_21@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Carmen Zuleta ', 'email' => 'carmenemiliazuletas@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Gonzalez Ruben', 'email' => 'rubeno@serpicopy.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Maria Angeles Jurado Ibañez', 'email' => 'mariangelesjui@hotmail.es', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Penelope Ribbecke', 'email' => 'pribbecke@aol.de', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lyndell Perdigon', 'email' => 'lyndellps@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Ramfis Leroy Medina Blanco', 'email' => 'ramfissm@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Allison Bersgs', 'email' => 'allisonbergs@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Daneilis Concepcion', 'email' => 'ddmcl2087@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Julian Lopez ', 'email' => 'julian.lopez.alzate@hotmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Liliana Orozco', 'email' => 'lilianacop@gmail.com', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
        $user = User::create([ 'name' => 'Lorena Villarreal', 'email' => 'magia@lorenavillarreal.mx', 'password' => bcrypt('01020304')]);
        $suscription = new Subscription();
        $suscription->user_id = $user->id;
        $suscription->plan_id = 2;
        $suscription->save();
        $fase = Fase::find(1);
        $fase->clients()->attach($user->id);
        
    }

    public function fasedos(){
        $user = User::create([ 'name' => 'Maria Mercedes González', 'email' => 'mercepego@gmail.com', 'password' => bcrypt('01020304')]);
        $subscription = Subscription::create(['id' => 34, 'user_id' => $user->id, 'plan_id' => 2]);
    }

    public function subs(){
        $subs = Subscription::all();

        dd($subs);
    }

}