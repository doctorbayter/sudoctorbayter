<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserBebidas extends Component
{
    public $user_fases;
    public function render()
    {
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->subscription->plan->fases;
        }
        $bebidas = Recipe::where('type', '3')->get();
        return view('livewire.user-bebidas', compact('bebidas'));
    }
}
