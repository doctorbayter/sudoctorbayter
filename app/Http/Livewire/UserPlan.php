<?php

namespace App\Http\Livewire;

use App\Models\Fase;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class UserPlan extends Component
{
    public $user_fases, $user_retos, $user_adicionales, $user_plan, $user_plan_data, $is_premium, $plan_week, $subscribed_fase_week, $subscribed_reto_actual, $subscribed_whatsapp , $re_desafio, $thf_plan;

    public function mount(){
        $this->user_fases = auth()->user()->fases->whereIn('id', [1, 2, 3, 4])->sortBy('id');

        if (auth()->user()->id == 3420 || auth()->user()->id == 1) {
            $this->user_retos = auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4, 5, 7, 8, 9, 10, 11, 13, 14, 15, 16])->sortBy('id');
        } else {
            $this->user_retos = auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4, 5, 7, 8, 9, 10, 11, 13, 14, 15, 16])->sortBy('id');
        }
        
        $this->user_adicionales = auth()->user()->fases->whereIn('id', [5, 7])->sortBy('id');
        $this->thf_plan = Plan::find(23);

        $this->is_premium = auth()->user()->fases->whereIn('id', [2]);

    }

    public function render(){


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

        if($whatsapp){
            if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->gt(\Carbon\Carbon::now())){
                $this->subscribed_whatsapp = true;
            }
        }

        $this->plan_week = Plan::find(7);
        $fase_week = Fase::find(5);
        $this->subscribed_fase_week = $fase_week->clients->contains(auth()->user()->id);


        $reto_actual = Fase::find(1700);
        $this->subscribed_reto_actual = $reto_actual->clients->contains(auth()->user()->id);

        $planUpdate = Plan::find(3);

        if (Request::route()->getName() == "plan.dkp") {
            return view('livewire.user-plan', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));
        } else {
            return view('livewire.plan-index', compact('planPremium', 'planWhatsapp', 'planUpdate', 'whatsapp', 'dkp'));

        }

    }

}
