<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\User;

use Livewire\Component;

class UserPlan extends Component
{
    public $user_fases;

    public function render(){

        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        

        $planPremium = Plan::find(1); 
        $planUpdate = Plan::find(3);
        $planWhatsapp = Plan::find(4);
        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();
        $dkp = auth()->user()->subscriptions->where('plan_id', 5)->first();
        return view('livewire.user-plan', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));
    }
}
