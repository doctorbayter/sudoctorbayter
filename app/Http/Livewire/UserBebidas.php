<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserBebidas extends Component
{
    public $user_fases, $user_plan;
    public function render()
    {

        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first();
        $this->user_plan = $planUser->plan->id;

        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }

        if($planUser->plan->id == 7 || $planUser->plan->id == 17 || $planUser->plan->id == 18){
            $bebidas = Recipe::where('type', '3')->take(3)->get();
        }else{
            $bebidas = Recipe::where('type', '3')->get();
        }
        return view('livewire.user-bebidas', compact('bebidas'));
    }
}
