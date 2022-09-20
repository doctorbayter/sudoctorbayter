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


    public function setUserData(User $user, Plan $plan){

        $fases_premium  = Fase::whereIn('id', [1, 2, 3, 4])->get();
        $fase_one       = Fase::where('id', [1])->get();

        $already_subscribed  = $user->subscriptions()->where(["plan_id" => $plan->id])->first();

        if($already_subscribed){
            return "El usuario ya está inscrito al plan";
        }

        switch ($plan->id) {
            case ('1'):
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fases_premium);
                break;
            case ('2'):
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fase_one);
                break;
            case ('3'):
                $this->addSuscription($user->id, 1);
                $this->setFases($user->id, $fases_premium);
                break;
            case ('8'):
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fase_one);
                break;
            case ('9'):
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fases_premium);
                break;
            case('15'):
                $this->addSuscription($user->id, $plan->id);
                $this->setFases($user->id, $fases_premium);
                break;
        }
    }

    public function addSuscription($user_id, $plan_id) {
        $suscription_plan           = new Subscription();
        $suscription_plan->user_id  = $user_id;
        $suscription_plan->plan_id  = $plan_id;
        $suscription_plan->save();
    }

    public function setFases($user_id, $fases) {
        foreach($fases as $fase){
            if(!$fase->clients->contains($user_id)){
                $fase->clients()->attach($user_id);
            }
        }
    }
}
