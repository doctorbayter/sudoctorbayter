<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserWhatsapp extends Component
{
    public $user_fases;
    public function render()
    {
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $planWhatsapp = Plan::find(4);
        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();
        return view('livewire.user-whatsapp', compact('planWhatsapp', 'whatsapp'));
    }
}
