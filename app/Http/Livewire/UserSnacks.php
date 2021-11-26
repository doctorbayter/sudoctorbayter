<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSnacks extends Component
{

    public $user_fases, $user_plan;

    public function render()
    {
        $planUser = auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9, 10, 15, 16])->first();
        $this->user_plan = $planUser->plan->id;
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }

        if($planUser->plan->id == 7){
            $snacks = Recipe::where('type', '2')->take(2)->get();
        }else{
            $snacks = Recipe::where('type', '2')->get();
        }


        return view('livewire.user-snacks', compact('snacks'));
    }
}
