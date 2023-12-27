<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Subscription $subscription){

        if($subscription->plan_id == 1 || $subscription->plan_id == 2 || $subscription->plan_id == 7 || $subscription->plan_id == 8 || $subscription->plan_id == 9 || $subscription->plan_id == 10 || $subscription->plan_id == 15 || $subscription->plan_id == 16 || $subscription->plan_id == 17 || $subscription->plan_id == 18 || $subscription->plan_id == 19 || $subscription->plan_id == 23 || $subscription->plan_id == 24 || $subscription->plan_id == 25 || $subscription->plan_id == 27 || $subscription->plan_id == 31 || $subscription->plan_id == 32 || $subscription->plan_id == 36 || $subscription->plan_id == 37 || $subscription->plan_id == 38 || $subscription->plan_id == 39 || $subscription->plan_id == 40 || $subscription->plan_id == 47 || $subscription->plan_id == 48 || $subscription->plan_id == 49 || $subscription->plan_id == 50 || $subscription->plan_id == 51 || $subscription->plan_id == 52 || $subscription->plan_id == 53 || $subscription->plan_id == 54) {
            if($subscription->user_id == $user->id){
                return true;
            }
        }else{
            return false;
        }
    }
}
