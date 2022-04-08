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
    public $error_message = "* Tenemos un error, revisa la información suminitrada anteriormente";
    public $error_button = "Toca aquí para confirmar la información";

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

        if($plan->id == 1 && $sale == "xxxregaloxxx"){
            $this->flash_sale = 77;
        }else{
            $this->flash_sale = false;
        }

        $this->list_id = 18;
        $this->plan = $plan;
    }

    public function render() {

        if($this->plan->id == 15 || $this->plan->id == 18 || $this->plan->id == 19){
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

        //$this->activeCampaign();
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
                $user_exist->password = bcrypt($this->password);
                $user_exist->save();
                $user = $user_exist;
            }else{
                $user = User::create([
                    'name' => $this->name,
                    'email' => strtolower($this->email),
                    'password' => bcrypt($this->password)
                ]);
            }

            $user->createOrGetStripeCustomer();

            if($this->flash_sale != false){
                $user->charge( $this->flash_sale * 100 , $paymentMethod);
            }else{
                $user->charge( $this->plan->finalPrice * 100 , $paymentMethod);
            }


            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $this->plan->id;

            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $this->plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)
                                                ->where('plan_id', 2)
                                                ->orWhere('plan_id', 3)
                                                ->orWhere('plan_id', 7)
                                                ->orWhere('plan_id', 8)
                                                ->orWhere('plan_id', 9)
                                                ->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(4, 11, 12))->first();

            $fases_premium = Fase::whereIn('id', [1, 2, 3, 4])->get();
            $fase = Fase::find(10);

            if($this->plan->id == 25){
                if($previous_subscribed){
                    $previous_subscribed->delete();
                }

                if(!$is_subscribed){
                    $suscription->save();
                    foreach($fases_premium as $fase){
                        if(!$fase->clients->contains($user->id)){
                            $fase->clients()->attach($user->id);
                        }
                    }
                    //$fase->clients()->attach($user->id);
                }

                if($whatsapp_subscribed){
                    if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                        $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(30)]);
                    }else{
                        $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(30)]);
                    }
                    $whatsapp_subscribed->save();
                }else{
                    $suscription_whatsApp             = new Subscription();
                    $suscription_whatsApp->user_id    = $user->id;
                    $suscription_whatsApp->plan_id    = 4;
                    $suscription_whatsApp->expires_at = \Carbon\Carbon::now()->addDays(30);
                    $suscription_whatsApp->save();
                }

                switch ($this->plan->id) {
                    case 7:
                        $mail = new ApprovedPurchaseNoChat($this->plan, $user);
                        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    break;
                    case 19:
                        $mail = new ApprovedPurchaseReto($this->plan, $user);
                        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    break;
                    default:
                        $mail = new ApprovedPurchase($this->plan, $user);
                        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
                    break;
                }

                //$this->activeCampaign();

                return redirect()->route('payment.stripe.approved', ['plan'=>$this->plan, 'name'=>$this->name, 'email'=>$this->email]);
            }


        } catch (Exception $e) {
            $this->emit('errorStripePayment');
        }
    }
}
