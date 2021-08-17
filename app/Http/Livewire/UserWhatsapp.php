<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserWhatsapp extends Component
{
    public $user_fases, $user_plan;
    public function render()
    {
        $planUser = auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9])->first();
        $this->user_plan = $planUser->plan->id;
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $planWhatsapp = Plan::find(4);
        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();
        return view('livewire.user-whatsapp', compact('planWhatsapp', 'whatsapp'));
    }
}
