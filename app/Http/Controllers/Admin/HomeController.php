<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedPurchase;
use App\Models\Discount;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\Price;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function send($email, $plan){

        $plan = Plan::find($plan);

        $user = User::where('email', $email)->first();

        if($user){
            //Enviar Correo
            $mail = new ApprovedPurchase($plan, $user);
            Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
            return 'Mensaje enviado';
        }else{
            return 'Usuario no encontrado';
        }
        //return view('mail.approved-purchase', compact('plan','user'));
    }

    public function sql() {
        DB::insert("SELECT setval(pg_get_serial_sequence('subscriptions', 'id'), max(id)) FROM subscriptions");
        DB::insert("SELECT setval(pg_get_serial_sequence('fase_user', 'id'), max(id)) FROM fase_user");
    }

    public function users(){
        $users = User::orderBy('id', 'DESC')->first();
        dd($users->email);
    }

    public function add($email, $plan, $whatsapp){

        $user = User::where('email', $email)->first();

        if($user){

            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan)->first();

            if($is_subscribed){
                return 'Ya está registrado';
            }else {

                $suscription = new Subscription();
                $suscription->user_id = $user->id;
                $suscription->plan_id = $plan;

                $all_fases = Fase::all();
                $fase_one = Fase::find(1);

                switch ($plan) {
                    case 1:
                        $suscription->save();
                        foreach($all_fases as $fase){
                            $fase->clients()->attach($user->id);
                        }
                    break;
                    case 2:
                        $suscription->save();
                        $fase_one->clients()->attach($user->id);
                    break;
                }
                if($whatsapp){
                    $whatsApp30 = new Subscription();
                    $whatsApp30->user_id = $user->id;
                    $whatsApp30->plan_id = 4;
                    $whatsApp30->expires_at = \Carbon\Carbon::now()->addDays(30);
                    $whatsApp30->save();
                }
                return 'Do it';
            }
        }else{
            return 'Usuario no encontrado';
        }

    }

    public function fase($email, $fase){
        $user = User::where('email', $email)->first();
        $fase = Fase::find($fase);

        if($user){
            $is_subscribed = $fase->clients->contains($user->id);
            if($is_subscribed){
                return 'Ya está registrado';
            }else {
                $fase->clients()->attach($user->id);
                return 'Do it';
            }
        }else{
            return 'Usuario no encontrado';
        }
    }

    public function discount(){



        $discount = Discount::find(4);
        $discount->name = '21 días Dieta Keto - Fase 1';
        $discount->save();

        /*$discount = Discount::find(4);
        $discount->value = 147;
        $discount->name = 'Lanzamiento Página Web';
        $discount->expires_at = '2099-12-31 23:59:59';
        $discount->save();*/
    }

    public function price(){

        DB::table('plans')->where('id', '=', '2')->update(['price_id' => 5]);

        //$prices = Price::all();
        /*$plan = Plan::find(1);
        $plan->price_id = 8;
        $plan->discount_id = 2;
        $plan->save();*/
    }

    public function plan($email, $plan_id){
        $user = User::where('email', $email)->first();
        $plan = Plan::find($plan_id);
        $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();

        if($user){

            if (!$is_subscribed) {
                if($plan_id == 1){
                    $current_plan = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
                    if($current_plan){
                        $current_plan->delete();
                        $suscription = new Subscription();
                        $suscription->user_id = $user->id;
                        $suscription->plan_id = $plan->id;
                        $suscription->save();
                    }else{
                        $suscription = new Subscription();
                        $suscription->user_id = $user->id;
                        $suscription->plan_id = $plan->id;
                        $suscription->save();
                    }
                }else{
                    $current_plan = Subscription::where('user_id', $user->id)->where('plan_id', 1)->first();
                    if($current_plan){
                        $current_plan->delete();
                        $suscription = new Subscription();
                        $suscription->user_id = $user->id;
                        $suscription->plan_id = $plan->id;
                        $suscription->save();
                    }else{
                        $suscription = new Subscription();
                        $suscription->user_id = $user->id;
                        $suscription->plan_id = $plan->id;
                        $suscription->save();
                    }
                }
                return 'Do it';
            }else{
                return 'Ya está registrado';
            }
        }else{
            return 'Usuario no encontrado';
        }


    }

    public function pass($email, $pass){
        $user = User::where('email', $email)->first();

        if($user){
            $user->password = bcrypt($pass);
            $user->save();
            return 'Do it';
        }else{
            return 'Usuario no encontrado';
        }

    }

}
