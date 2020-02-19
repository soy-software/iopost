<?php

namespace App\Policies;

use App\Models\Inscripcion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscripcionPolicy
{
    use HandlesAuthorization;



// aqui esta de analizar, xk no se ni puta idea hace
    public function xxx(User $user, Inscripcion $inscripcion)
    {
        return false;
    }


}
