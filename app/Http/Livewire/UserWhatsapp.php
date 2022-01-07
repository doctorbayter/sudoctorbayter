<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Livewire\Component;

class UserWhatsapp extends Component
{
    public $user_fases, $user_plan, $subscribed_whatsapp = false, $planWhatsapp3meses, $planWhatsapp6meses;
    public function render()
    {
        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14, 17])->first();
        $this->user_plan = $planUser->plan->id;
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $planWhatsapp = Plan::find(4);
        $this->planWhatsapp3meses = Plan::find(11);
        $this->planWhatsapp6meses = Plan::find(12);


        $whatsapp = auth()->user()->subscriptions->where('plan_id', 4)->first();

        if($whatsapp){
            if(\Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->gt(\Carbon\Carbon::now())){
                $this->subscribed_whatsapp = \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->diffInDays(\Carbon\Carbon::now());
            }
        }

        return view('livewire.user-whatsapp', compact('planWhatsapp', 'whatsapp'));
    }
}
