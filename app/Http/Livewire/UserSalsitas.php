<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSalsitas extends Component
{
    public $user_fases;
    public function render()
    {
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $salsitas = Recipe::where('type', '4')->get();
        return view('livewire.user-salsitas', compact('salsitas'));
    }
}
