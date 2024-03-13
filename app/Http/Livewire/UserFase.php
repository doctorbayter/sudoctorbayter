<?php

namespace App\Http\Livewire;

use App\Models\Day;
use App\Models\Fase;
use App\Models\Recipe;
use App\Models\Subscription;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class UserFase extends Component
{
    use AuthorizesRequests;

    public $fase , $day, $days, $current, $carbs, $snacks, $snack, $user_fases, $user_retos, $user_plan, $es_ayuno, $day_recipes = [], $upsell21 = false, $daysRemaining, $availableAt, $subscriptionPlanExists;

    public function mount(Fase $fase){

            // Asumiendo que cada usuario tiene una suscripción, ajusta según tu lógica de negocio
            $subscription = Subscription::where('user_id', auth()->user()->id)
                            ->where('plan_id', 7)
                            ->first();

            if ($fase->id == 5) {

                $this->subscriptionPlanExists = Subscription::where('user_id', auth()->user()->id)
                    ->whereIn('plan_id', [1,15, 8, 10, 37, 38, 39,40,16,27,3,32,48,25,31,54,9, 2])
                    ->exists();

                $creationDate = Carbon::parse($subscription->created_at);
                $fiveDaysAgo = Carbon::now()->subDays(5);
               

                if ($creationDate > $fiveDaysAgo) {
                    // La suscripción fue creada hace menos de 5 días
                    // Calcular cuántos días faltan para que la suscripción tenga 5 días
                    $daysUntilAvailable = $creationDate->diffInDays(Carbon::now()) + 1; // +1 para incluir el día actual en el cálculo
                    $this->daysRemaining = 5 - $daysUntilAvailable;
                    $this->availableAt = $creationDate->addDays(5);
                } else {
                    $this->upsell21 = true;
                }
            }

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
        }else if($day_count == 8){
            $this->days = 8;
        }
        else{
            $this->days = 7;
        }

        // if($this->fase->id == 3){
        //     $this->es_ayuno = $this->day->recipes->where('type', '==', 1)->sortBy('pivot.meal');
        // }else{
        //     $this->es_ayuno = $this->day->recipes->where('type', '==', 1);
        // }

        $planUser = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->sortBy('plan_id')->first();
        $this->user_plan = $planUser->plan->id;


        $this->setCarbs($this->day);
        $this->dayRecipes($this->day);


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


    public function dayRecipes(Day $day){
        $day_recipes = $day->recipes->where('type', '==', 1)->sortBy('pivot.meal');
        
        foreach ($day_recipes as $recipe) {
            switch ($recipe->pivot->meal) {
                case 1:
                    array_push($this->day_recipes, $recipe);
                    break;
                case 2:
                    array_push($this->day_recipes, $recipe);
                    break;
                case 3:
                    array_push($this->day_recipes, $recipe);
                    break;
                case 4:
                    array_unshift($this->day_recipes, $recipe);
                    break;
            }
        }
    }


    public function toogleSnack($snackId)
    {
        $this->reset('snack');
        $this->snack = Recipe::find($snackId);

    }

    public function setDay(Day $day)
    {
        $this->day->users()->detach(auth()->user()->id);
        $this->day = $day;
        $this->day->users()->attach(auth()->user()->id);

        $this->reset('carbs');
        $this->setCarbs($day);
        $this->reset('day_recipes');
        $this->dayRecipes($day);
    }


    public function download($resource){
        return response()->download(storage_path('app/public/'. $resource));
    }
}
