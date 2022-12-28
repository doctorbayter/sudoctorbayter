<?php

namespace App\Http\Livewire;

use App\Mail\ApprovedPurchase;
use App\Mail\ApprovedPurchaseNoChat;
use App\Mail\ApprovedPurchaseReto;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\User;
use Livewire\Component;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ProductPay extends Component
{
    public $plan, $suscription, $flash_sale;
    public $name, $email, $email_confirmation,  $password, $password_confirmation, $data_send, $list_id;
    public $can_continued = false;
    public $error_message = "<a href='#formulario'>* Tenemos un error, revisa la información que escribiste arriba</a>";
    public $error_button = "Toca aquí para confirmar la información";
    public $toogle_promo = null;

    protected $listeners = ['paymentMethodCreate'];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'email_confirmation' => 'email|min:6|required_with:email|same:email',
        'password' => 'required|min:8',
        'password_confirmation' => 'min:8|required_with:password|same:password'
    ];

    public function updated($propertyName)
    {
        $this->can_continued = false;
        $this->reset(['error_button']);
        $this->validateOnly(trim($propertyName));
    }

    public function mount(Plan $plan, $sale = null){

        if ($this->plan->id == 9) {
            $this->toogle_promo = 1;
        }

        if ($this->plan->id == 7) {
            $this->is_week = true;
        }

        $this->list_id = 34;
        $this->plan = $this->plan;
    }

    public function render() {

        if($this->plan->id == 15 || $this->plan->id == 18 || $this->plan->id == 19 || $this->plan->id == 25 || $this->plan->id == 36 || $this->plan->id == 47){
            return view('no-disponible-lw');
        }
            return view('livewire.product-pay');
    }

    public function confirmData(){

        if (auth()->user()) {
            $user_exist = auth()->user();
            $email = $user_exist->email;
        }else{

            $this->email = trim($this->email);
            $this->email_confirmation = trim($this->email_confirmation);

            $this->validate();
            $email = strtolower($this->email);
            $user_exist = User::where('email', $email)->first();
        }

        if($user_exist){
            $user = $user_exist;

            $suscription = Subscription::where('user_id', $user->id)->where('plan_id', $this->plan->id)->first();

            if ($suscription) {
                $this->can_continued = false;
                $this->error_button = "No puedes continuar con la compra, el usuario $email ya está registrado a este plan";
                return;
            }
        }
        $this->can_continued = true;
        $this->data_send = "$this->name~$email~$this->password~0";

    }


    public function activeCampaign() {

        $response = Http::withHeaders([
            'Api-Token' => 'c1d483a96b0fd0f622ed137c5679b1d97ebd130b09501ab4e1d384e1a4a64ef6c34ff576'
        ]);
        $getUserByEmail = $response->GET('https://doctorbayter.api-us1.com/api/3/contacts/',[
            "email" => $this->email,
            "orders[email]" => "ASC"
        ]);
        $userData = $getUserByEmail['contacts'];

        if($userData){
            $userListsLink = $userData[0]['links']['contactLists'];
            $userId = $userData[0]['id'];

        }else{
            $user_name = $this->splitName($this->name);
            $addUser = $response->POST('https://doctorbayter.api-us1.com/api/3/contacts',[
                "contact" => [
                    "email" => $this->email,
                    "firstName" => $user_name[0],
                    "lastName" => $user_name[1],
                ]
            ]);
            $userListsLink = $addUser['contact']['links']['contactLists'];
            $userId = $addUser['contact']['id'];
        }

        $getUserLists =  $response->GET($userListsLink);

        $userLists = $getUserLists['contactLists'];

        if(count($userLists) > 0) {

            foreach($userLists as $userList ) {

                if($userList['list'] == $this->list_id){

                    if($userList['status'] == 1){
                       return false;
                    }else if($userList['status'] == "2") {
                        $addUserToList = $response->POST('https://doctorbayter.api-us1.com/api/3/contactLists',[
                            "contactList" => [
                                "list" => $this->list_id,
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
                            "list" => $this->list_id,
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
                    "list" => $this->list_id,
                    "contact" => $userId,
                    "status" => 1
                ]
            ]);
            return true;
        }
    }

    public function paymentMethodCreate($paymentMethod){

        try {
            $user_exist = User::where('email', $this->email)->first();

            if($user_exist){
                $user = $user_exist;
            }else{
                $user = User::create([
                    'name' => $this->name,
                    'email' => strtolower($this->email),
                    'password' => bcrypt($this->password)
                ]);
            }

            $user->createOrGetStripeCustomer();

            $user->charge( $this->plan->finalPrice * 100 , $paymentMethod);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $this->plan->id;

            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $this->plan->id)->first();

            $fases_premium = Fase::whereIn('id', [1, 2, 3, 4])->get();
            $fase_one = Fase::find(1);
            $desafio_2023 = Fase::find(15);

            if($this->plan->id != 5 || $this->plan->id != 6){

                if(!$is_subscribed){
                    $suscription->save();
                }

                if($this->plan->id == 1 || $this->plan->id == 3 || $this->plan->id == 9 || $this->plan->id == 10 || $this->plan->id == 15 || $this->plan->id == 16 || $this->plan->id == 25 || $this->plan->id == 27 || $this->plan->id == 31 || $this->plan->id == 37 || $this->plan->id == 38 || $this->plan->id == 40 || $this->plan->id == 48) {
                    $this->setFases($user->id, $fases_premium);
                }else if($this->plan->id == 39) {
                    $this->setFases($user->id, $fases_premium);
                    $this->addSuscription($user->id, $this->plan_total->id);
                }else if($this->plan->id == 2 || $this->plan->id == 8) {
                    if($fase_one->clients()->where('users.id', $user->id)->doesntExist()){
                        $fase_one->clients()->attach($user->id);
                    }
                }else if($this->plan->id == 49) {

                    if($desafio_2023->clients()->where('users.id', $user->id)->doesntExist()){
                        $desafio_2023->clients()->attach($user->id);
                    }
                    
                }

                if($this->plan->id == 49){
                    $mail = new ApprovedPurchaseReto($this->plan, $user);
                    Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                }else{
                    $mail = new ApprovedPurchase($this->plan, $user);
                    Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                }
                

                return redirect()->route('payment.stripe.approved', ['plan'=>$this->plan, 'name'=>$this->name, 'email'=>$this->email]);

            }else {
                $suscription->save();
                $mail = new ApprovedPurchase($this->plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                return redirect()->route('payment.stripe.approved', ['plan'=>$this->plan, 'name'=>$this->name, 'email'=>$this->email]);
            }


        } catch (Exception $e) {
            $this->emit('errorStripePayment');
        }
    }

    public function tooglePromo()
    {
        if ($this->plan->id == 8 || $this->plan->id == 9) {
            if ($this->toogle_promo) {
                $this->plan = Plan::find(9);
            }else{
                $this->plan = Plan::find(8);
            }

        }
    }

    public function setFases($user_id, $fases) {
        foreach($fases as $fase){
            if($fase->clients()->where('users.id', $user_id)->doesntExist()){
                $fase->clients()->attach($user_id);
            }
        }
    }

}
