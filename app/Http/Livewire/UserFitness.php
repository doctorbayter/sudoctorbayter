<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserFitness extends Component
{
    public $day, $plan, $fase;

    public function mount(){
        if( ! auth()->user()->subscriptions->whereIn('plan_id', [23, 24])->sortBy('plan_id')->first()){
            redirect()->route('plan.index');
        }

    }

    public function render()
    {
        return view('livewire.user-fitness');
    }


}
