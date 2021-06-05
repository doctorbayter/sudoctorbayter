<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSnacks extends Component
{

    public function render()
    {
        $snacks = Recipe::where('level_id', '4')->get();
        return view('livewire.user-snacks', compact('snacks'));
    }
}
