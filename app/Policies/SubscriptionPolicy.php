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

        if($subscription->plan_id == 1 || $subscription->plan_id == 2 || $subscription->plan_id == 7 || $subscription->plan_id == 8 || $subscription->plan_id == 9 || $subscription->plan_id == 10 || $subscription->plan_id == 15 || $subscription->plan_id == 16 || $subscription->plan_id == 17 || $subscription->plan_id == 18 || $subscription->plan_id == 19) {
            if($subscription->user_id == $user->id){
                return true;
            }
        }else{
            return false;
        }


    }
}
