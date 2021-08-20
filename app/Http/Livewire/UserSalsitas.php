<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class UserSalsitas extends Component
{
    public $user_fases, $user_plan;
    public function render()
    {
        $planUser = auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9])->first();
        $this->user_plan = $planUser->plan->id;

        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $salsitas = Recipe::where('type', '4')->take(1)->get();
        return view('livewire.user-salsitas', compact('salsitas'));
    }
}
