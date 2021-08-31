<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;

use Livewire\Component;

class UserPlan extends Component
{
    public $user_fases, $user_plan, $is_premium;

    public function render(){

        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases->sortBy('id');
        }

        $planUser = auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9, 10])->first();



        $planPremium = Plan::find(1);



        $planWhatsapp = Plan::find(4);

        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();



        $dkp = auth()->user()->subscriptions->where('plan_id', 5)->first();




        $this->user_plan = $planUser->plan->id;



        $this->is_premium = Subscription::where('user_id', auth()->user()->id)
                                                ->where('plan_id', 1)
                                                ->orWhere('plan_id', 9)
                                                ->orWhere('plan_id', 10)
                                                ->first();



        if($planUser->plan->id == 7){

            $planUpdate = Plan::find(8);
            return view('livewire.user-plan-week', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));
        }else{

            $planUpdate = Plan::find(3);
            return view('livewire.user-plan', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));
        }


    }
}
