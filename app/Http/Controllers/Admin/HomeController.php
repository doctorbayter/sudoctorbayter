<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedPurchase;
use App\Mail\ApprovedPurchaseNoChat;
use App\Models\Discount;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\Price;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function sql() {
        DB::insert("SELECT setval(pg_get_serial_sequence('subscriptions', 'id'), max(id)) FROM subscriptions");
        DB::insert("SELECT setval(pg_get_serial_sequence('fase_user', 'id'), max(id)) FROM fase_user");
    }

    public function add($email, $plan_id){

        $user = User::where('email', $email)->first();
        $plan = Plan::find($plan_id);
        if($user){
            $this->setUserData($user, $plan);
            $this->send($user->email, $plan->id);
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

    public function noFase($email, $fase){
        $user = User::where('email', $email)->first();
        $fase = Fase::find($fase);

        if($user){
            $is_subscribed = $fase->clients->contains($user->id);
            if($is_subscribed){
                $fase->clients()->detach($user->id);
                return 'Do it';
            }else {
                return 'No está registrado';
            }
        }else{
            return 'Usuario no encontrado';
        }
    }

    public function plan($email, $plan_id){
        $user = User::where('email', $email)->first();
        $plan = Plan::find($plan_id);
        $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();

        if($user){
            if (!$is_subscribed) {
                $suscription = new Subscription();
                $suscription->user_id = $user->id;
                $suscription->plan_id = $plan->id;
                $suscription->save();
                return 'Do it';
            }else{
                return 'Ya está registrado';
            }
        }else{
            return 'Usuario no encontrado';
        }
    }

    public function noPlan($email, $plan_id){
        $user = User::where('email', $email)->first();
        $plan = Plan::find($plan_id);
        $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();

        if($user){
            if ($is_subscribed) {
                $is_subscribed->delete();
                return 'Do it';
            }else{
                return 'No está registrado';
            }
        }else{
            return 'Usuario no encontrado';
        }

    }

    public function user($email){
        $user = User::where('email', $email)->first();
        if($user){
            echo "<b>Datos del usuario</b></br>";
            echo "ID: ". $user->id."</br>";
            echo "Nombre: ". $user->name."</br>";
            echo "Email: ". $user->email."</br>";
        }else{
            return 'Usuario no encontrado';
        }
    }

    public function noUser($id){
        $user = User::find($id);
        if($user){
            $user->delete();
        }else{
            return 'Usuario no encontrado';
        }
    }

    public function discount(){

        /*$discount = Discount::find(4);
        $discount->value = 147;
        $discount->name = 'Lanzamiento Página Web';
        $discount->expires_at = '2099-12-31 23:59:59';
        $discount->save();*/
    }

    public function price(){
        $plan = Plan::find(7);
        $plan->price_id = 2; // 2 -> 19.99 || 14 -> 9.99
        $plan->save();
    }

    public function send($email, $plan_id){

        $plan = Plan::find($plan_id);
        $user = User::where('email', $email)->first();

        if($user){
            switch ($plan->id) {
                case 7:
                    $mail = new ApprovedPurchaseNoChat($plan, $user);
                    Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    break;
                default:
                    $mail = new ApprovedPurchase($plan, $user);
                    Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    break;
            }
            return 'Mensaje enviado';
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

        $getUserLists =  $response->GET($userListsLink);

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

    public function setUserData(User $user, Plan $plan){

        $is_already_subscribed      = Subscription::where('user_id', $user->id)->where('plan_id', $plan->id)->first();
        $previous_plan_premium      = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(2, 7, 8))->first();
        $previous_plan_selecto      = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 7, 8, 9, 10))->first();
        $previous_plan_week         = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(1, 2, 8, 9, 10))->first();
        $subscribed_plan_1          = Subscription::where('user_id', $user->id)->where('plan_id', 1)->first();
        $subscribed_plan_2          = Subscription::where('user_id', $user->id)->where('plan_id', 2)->first();
        $subscribed_plan_7          = Subscription::where('user_id', $user->id)->where('plan_id', 7)->first();
        $subscribed_plan_8          = Subscription::where('user_id', $user->id)->where('plan_id', 8)->first();
        $subscribed_plan_9          = Subscription::where('user_id', $user->id)->where('plan_id', 9)->first();
        $subscribed_plan_10         = Subscription::where('user_id', $user->id)->where('plan_id', 10)->first();
        $fases_premium              = Fase::whereIn('id', array(1, 2, 3, 4))->get();
        $fase_one                   = Fase::find(1);
        $fase_week                  = Fase::find(5);

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
                case 15:
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

        if($plan->id != 3 || $plan->id != 4 || $plan->id != 5 || $plan->id != 6 || $plan->id != 7 || $plan->id != 11 || $plan->id != 12 ){
            $this->activeCampaign($user->email, 16);
        }

    }

    public function addSuscription($user_id, $plan_id) {
        $suscription_plan           = new Subscription();
        $suscription_plan->user_id  = $user_id;
        $suscription_plan->plan_id  = $plan_id;
        $suscription_plan->save();
    }
}
