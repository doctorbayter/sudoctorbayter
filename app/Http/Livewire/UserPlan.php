<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserPlan extends Component
{
    public function render(){

        $planPremium = Plan::find(1);        
        $planWhatsapp = Plan::find(4);
        $planDkp = Plan::find(5);
        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();
        $dkp = auth()->user()->subscriptions->where('plan_id', 5)->first();
        return view('livewire.user-plan', compact('planPremium', 'planWhatsapp', 'planDkp', 'whatsapp', 'dkp'));
    }
}
