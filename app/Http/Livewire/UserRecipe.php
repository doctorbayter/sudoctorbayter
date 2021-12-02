<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class UserRecipe extends Component
{
    use AuthorizesRequests;

    public $recipe, $user_fases, $user_plan;

    public function mount(Recipe $recipe){
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $this->recipe = $recipe;

        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first();
        $this->user_plan = $planUser->plan->id;

    }
    public function render(){

        return view('livewire.user-recipe');
    }
}
