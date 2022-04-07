<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserFitness extends Component
{
    public $day, $plan, $fase;

    public function mount(){

    }

    public function render()
    {
        return view('livewire.user-fitness');
    }


}
