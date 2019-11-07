<?php

namespace App\Policies;

use App\Models\Inscripcion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscripcionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function mmm(User $user, Inscripcion $inscripcion)
    {
        
    }
}
