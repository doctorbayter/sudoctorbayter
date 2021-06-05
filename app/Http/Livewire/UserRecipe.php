<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserRecipe extends Component
{
    use AuthorizesRequests;

    public $recipe;

    public function mount(Recipe $recipe){
        $this->recipe = $recipe;
    }
    public function render(){

        return view('livewire.user-recipe');
    }
}
