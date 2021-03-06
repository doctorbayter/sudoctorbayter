<?php

namespace App\Http\Livewire;

use App\Models\Day;
use App\Models\Fase;
use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserFase extends Component
{
    use AuthorizesRequests;

    public $fase , $day, $days, $current, $carbs, $snacks, $snack, $user_fases, $user_retos, $user_plan;

    public function mount(Fase $fase){

        $this->fase = $fase;
        if(auth()->user()->subscription){
            $this->user_fases = auth()->user()->fases;
        }
        $this->user_retos = auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4])->sortBy('id');

        foreach($fase->days as $day){
            if($day->users()->find(auth()->user()->id)){

                $this->day = $day;
                break;
            }
        }
        if (!$this->day) {
            $this->day = $fase->days->first();
        }

        $day_count = 0;
        foreach ($fase->weeks as $key => $week){
            foreach ($week->days->sortBy('day') as $day){
                if ($day->fase->id == $fase->id){
                    $day_count = $day_count + 1;
                }
            }
        }

        if($day_count == 5){
            $this->days = 5;
        }else{
            $this->days = 7;
        }


        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->sortBy('plan_id')->first();
        $this->user_plan = $planUser->plan->id;


        $this->setCarbs($this->day);
    }

    public function render(){
        return view('livewire.user-fase');
    }

    public function setCarbs(Day $day)
    {
        foreach($day->recipes as $recipe){
            $this->carbs = $this->carbs + $recipe->carbs;
        }
    }

    public function toogleSnack($snackId)
    {
        $this->snack = Recipe::find($snackId);

    }

    public function setDay(Day $day)
    {
        $this->day->users()->detach(auth()->user()->id);
        $this->day = $day;
        $this->day->users()->attach(auth()->user()->id);

        $this->reset('carbs');
        $this->setCarbs($day);
    }


    public function download($resource){
        return response()->download(storage_path('app/public/'. $resource));
    }
}
