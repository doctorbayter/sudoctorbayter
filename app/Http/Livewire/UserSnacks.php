<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSnacks extends Component
{

    public $user_fases;
    
    public function render()
    {
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->subscription->plan->fases;
        }
        $snacks = Recipe::where('type', '2')->get();
        return view('livewire.user-snacks', compact('snacks'));
    }
}
