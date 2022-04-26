<?php

namespace App\Http\Livewire;

use App\Models\Fase;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;

use Livewire\Component;

class UserPlan extends Component
{
    public $user_fases, $user_retos, $user_adicionales, $user_plan, $user_plan_data, $is_premium, $plan_week, $subscribed_fase_week, $subscribed_reto_actual, $subscribed_whatsapp , $re_desafio;

    public function render(){

        $this->user_fases = auth()->user()->fases->whereIn('id', [1, 2, 3, 4])->sortBy('id');
        $this->user_retos = auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4, 5, 7, 9, 10])->sortBy('id');
        $this->user_adicionales = auth()->user()->fases->whereIn('id', [5, 7])->sortBy('id');

        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->sortBy('plan_id')->first();
        $planPremium = Plan::find(1);
        $planWhatsapp = Plan::find(4);
        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();
        $dkp = auth()->user()->subscriptions->where('plan_id', 5)->first();

        if($planUser){
            $this->user_plan = $planUser->plan->id ;
            $this->user_plan_data = $planUser->plan;
        }else{
            $this->user_plan = null;
        }


        $this->is_premium = Subscription::where('user_id', auth()->user()->id)
                                                ->where('plan_id', 1)
                                                ->orWhere('plan_id', 9)
                                                ->orWhere('plan_id', 10)
                                                ->orWhere('plan_id', 15)
                                                ->orWhere('plan_id', 25)
                                                ->first();

        if($whatsapp){
            if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->gt(\Carbon\Carbon::now())){
                $this->subscribed_whatsapp = true;
            }
        }

        $this->plan_week = Plan::find(7);
        $fase_week = Fase::find(5);
        $this->subscribed_fase_week = $fase_week->clients->contains(auth()->user()->id);

        $re_desafio = Fase::find(10);
        $is_in_re_desafio = $re_desafio->clients->contains(auth()->user()->id);

        if($is_in_re_desafio){
            $this->re_desafio = Fase::find(9);
        }


        $reto_actual = Fase::find(10);
        $this->subscribed_reto_actual = $reto_actual->clients->contains(auth()->user()->id);

        $planUpdate = Plan::find(3);
        return view('livewire.user-plan', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));
    }
}
