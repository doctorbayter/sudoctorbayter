<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserRecipe extends Component
{
    use AuthorizesRequests;

    public $recipe, $user_fases;

    public function mount(Recipe $recipe){
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $this->recipe = $recipe;
    }
    public function render(){

        return view('livewire.user-recipe');
    }
}
