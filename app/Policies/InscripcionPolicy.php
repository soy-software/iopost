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

    public function subirComprobante(User $user, Inscripcion $inscripcion)
    {
        if($inscripcion->estado!='Aprobado' && $inscripcion->user->id==$user->id){
            return true;
        }
    }

   
}
