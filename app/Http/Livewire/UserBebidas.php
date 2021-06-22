<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserBebidas extends Component
{
    public function render()
    {
        $bebidas = Recipe::where('type', '3')->get();
        return view('livewire.user-bebidas', compact('bebidas'));
    }
}
