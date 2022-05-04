<?php

namespace App\Http\Livewire;

use App\Mail\ApprovedPurchaseReseller;
use App\Models\Fase;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserFitnessReseller extends Component
{

    use WithPagination;



    public $search;

    public $plan, $plan_reseller;
    public $subscriptions;

    public function mount(){


        if( auth()->user()->email != "info@totaldefiner.com" || auth()->user()->email != "doctorbayter@gmail.com"){
            redirect()->route('plan.index');
            return;
        }

        $this->plan = Plan::find(23);
        $this->plan_reseller = Plan::find(24);
        $this->subscriptions = Subscription::where('plan_id', $this->plan_reseller->id)->get();

    }

    public function render(){

        $users = User::where(function($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        })
        ->join('subscription', 'subscription.user_id', '=', 'users.id')
        ->where('subscription.plan_id', $this->plan_reseller->id)
        ->paginate(10, ['users.*', 'subscription.created_at']);

        return view('livewire.user-fitness-reseller', compact('users'));
    }

    public function create(){
        return view('livewire.user-fitness-create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);


        $email_parts = explode('@', $request->input('email'));
        $user_password = $email_parts[0];

        $user = User::create([
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($user_password)
        ]);


        $plan = Plan::find(23);
        $plan_reseller = Plan::find(24);

        $this->addSuscription($user->id, $plan->id);
        $this->addSuscription($user->id, $plan_reseller->id);
        $fases_dkp = Fase::whereIn('id', array(1, 2, 3, 4))->get();

        foreach($fases_dkp as $fase){
            if(!$fase->clients->contains($user->id)){
                $fase->clients()->attach($user->id);
            }
        }

        $this->sendMail($user, $plan_reseller);

        return redirect()->route('plan.fitness.reseller');
    }

    public function addSuscription($user_id, $plan_id) {
        $suscription_plan           = new Subscription();
        $suscription_plan->user_id  = $user_id;
        $suscription_plan->plan_id  = $plan_id;
        $suscription_plan->save();
    }

    public function sendMail(User $user, Plan $plan){
        $mail = new ApprovedPurchaseReseller($plan, $user);
        Mail::to($user->email)->bcc('doctorbayter@gmail.com', 'Doctor Bayter')->send($mail);
    }

    public function clear_page(){
        $this->reset('page');
    }
}
