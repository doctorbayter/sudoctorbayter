<?php

namespace App\Policies;

use App\Models\Fase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FasePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function enrolled(User $user, Fase $fase){
        return $fase->clients->contains($user->id);
    }
}
