<?php

namespace App\Policies;


use App\Models\Maestria ;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaestriaPolicy
{
    use HandlesAuthorization;

    public function crearCortesMaestria(User $user, Maestria $maestria)
    {
        $maes=$maestria->cortes()->where('cortes.estado','=','Inscripciones')->count();
        if($maes>0){
            return false;
        }else{
            return true;
        }
        
    }

}
