<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class PlanCheckout extends Component
{

    public $plan, $suscription, $plan_upsale;
    public $name, $email, $email_confirmation,  $password, $password_confirmation, $data_send;
    public $is_week = false;
    public $can_continued = false;
    public $error_message = "* Tenemos un error, revisa la información suminitrada anteriormente";
    public $error_button = "Toca aquí para confirmar la información";
    public $toogle_promo = null;

    protected $rules = [
        'name' => 'required',
        //'email' => 'email|unique:App\Models\User,email|required_with:email_confirmation',
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



        if($this->plan->id == 4 || $this->plan->id == 11 || $this->plan->id == 12) { //WHATSAPP
            return view('no-disponible-lw');
        }



        if ($this->plan->id == 9) {
            $this->toogle_promo = 1;
        }

        if ($this->plan->id == 7) {
            $this->is_week = true;
        }

        // if ($this->plan->id == 4 ) { // Whatsapp
        //     if (!auth()->user()) {

        //         session()->flash('status', 'Para realizar la compra de '.$this->plan->name .' es necesario que inicies sesión');
        //         return redirect()->route('login');
        //     }
        // }

        if ($this->plan->id == 20 || $this->plan->id == 21 || $this->plan->id == 22){
            $this->password = "01020304";
            $this->password_confirmation = "01020304";
        }


        // if (auth()->user()) {
        //     $user = User::find(auth()->user()->id);
        //     $this->data_send =  "$user->name~$user->email~NotChange~1";

        //     if ($this->plan->id == 4 || $this->plan->id == 5 || $this->plan->id == 6) { // Whatsapp ~ Cita 40 mins ~ Cita 60 mins
        //         $this->can_continued = true;
        //     }
        // }
        $this->plan = $plan;
        return view('livewire.plan-checkout');
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

            if($this->plan->id != 4 || $this->plan->id != 5 || $this->plan->id != 6){ // Whatsapp ~ Cita 40 mins ~ Cita 60 mins

                if ($user->subscription) {
                    if ($user->subscription->plan->id == $this->plan->id) {
                        $this->can_continued = false;
                        $this->error_button = "No puedes continuar con la compra, el usuario $email ya está registrado a este plan";

                        return;
                    }
                }
            }
        }

        $this->can_continued = true;
        $this->data_send = "$this->name~$email~$this->password~0";

    }

    public function tooglePromo()
    {
        if ($this->plan->id == 8 || $this->plan->id == 9) {
            if($this->is_week == false){

                if ($this->toogle_promo) {
                    $this->plan = Plan::find(9);
                }else{
                    $this->plan = Plan::find(8);
                }
            }else{
                if($this->plan->id == 8){

                    if ($this->toogle_promo) {
                        $this->plan = Plan::find(8);
                    }else{
                        $this->plan = Plan::find(7);
                    }
                }
            }

        }else if ($this->plan->id == 7) {
            if ($this->toogle_promo) {

                $this->plan = Plan::find(8);
            }else{
                $this->plan = Plan::find(7);
            }
        }
    }

}
