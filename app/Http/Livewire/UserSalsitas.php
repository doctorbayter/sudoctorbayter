<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSalsitas extends Component
{
    public function render()
    {
        $salsitas = Recipe::where('level_id', '6')->get();
        return view('livewire.user-salsitas', compact('salsitas'));
    }
}
