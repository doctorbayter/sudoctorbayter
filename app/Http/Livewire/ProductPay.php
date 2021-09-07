<?php

namespace App\Http\Livewire;

use App\Mail\ApprovedPurchase;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\User;
use Livewire\Component;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Exception;

class ProductPay extends Component
{
    public $plan, $suscription;
    public $name, $email, $email_confirmation,  $password, $password_confirmation, $data_send;
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
        $this->validateOnly($propertyName);

    }

    public function mount(Plan $plan){

        $this->plan = $plan;

    }

    public function render() {


        return view('livewire.product-pay');
    }

    public function confirmData(){

        if (auth()->user()) {
            $user_exist = auth()->user();
            $email = $user_exist->email;
        }else{
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
                    'email' => $this->email,
                    'password' => bcrypt($this->password)
                ]);
            }

            $user->createOrGetStripeCustomer();

            $user->charge( $this->plan->finalPrice * 100 , $paymentMethod);

            $suscription = new Subscription();
            $suscription->user_id = $user->id;
            $suscription->plan_id = $this->plan->id;

            $whatsApp60 = new Subscription();
            $whatsApp60->user_id = $user->id;
            $whatsApp60->plan_id = 4;

            $is_subscribed = Subscription::where('user_id', $user->id)->where('plan_id', $this->plan->id)->first();
            $previous_subscribed = Subscription::where('user_id', $user->id)
                                                ->where('plan_id', 1)
                                                ->orWhere('plan_id', 2)
                                                ->orWhere('plan_id', 3)
                                                ->orWhere('plan_id', 7)
                                                ->orWhere('plan_id', 8)
                                                ->orWhere('plan_id', 9)
                                                ->first();
            $whatsapp_subscribed = Subscription::where('user_id', $user->id)->whereIn('plan_id', array(4, 11, 12))->first();

            $fases_premium = Fase::whereIn('id', [1, 2, 3, 4])->get();

            if($this->plan->id == 10){ //Grupo selecto

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
                }

                if($whatsapp_subscribed){
                    if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->gt(\Carbon\Carbon::now())){
                        $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp_subscribed->expires_at))->addDays(60)]);
                    }else{
                        $whatsapp_subscribed->update(['expires_at'=> \Carbon\Carbon::now()->addDays(60)]);
                    }
                    $whatsapp_subscribed->save();
                }else{
                    $whatsApp60->expires_at = \Carbon\Carbon::now()->addDays(60);
                    $whatsApp60->save();
                }

                $mail = new ApprovedPurchase($this->plan, $user);
                Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);

                return redirect()->route('payment.stripe.approved', ['plan'=>$this->plan, 'name'=>$this->name, 'email'=>$this->email]);

            }

        } catch (Exception $e) {
            $this->emit('errorStripePayment');
        }
    }
}
