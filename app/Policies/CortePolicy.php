<?php

namespace App\Policies;

use App\Models\Corte;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CortePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        //
    }

    public function mmm(User $user, Corte $corte)
    {
        
    }

}
