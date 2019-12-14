<?php

namespace App\Policies;

use App\Models\Corte;
use App\Models\Maestria;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CortePolicy
{
    use HandlesAuthorization;



    // A:deivid
    // D: verificasr que la corte pertenesca a la maestria asignada al coordinador
    public function verificarCorteMaestria(User $user,Corte $corte)
    {
        $isd_coortes=$user->cortes->pluck('id')->toArray();
        if(in_array($corte->id,$isd_coortes)){
            return true;
        }
    }


    // A:deivid
    // D: solo pueden crear cuestionario en
    public function crearCuestionario(User $user,Corte $corte)
    {
        if(($corte->estado=='Promoción' || $corte->estado=='Registro') && count($corte->cuestionario)<10){
            return true;
        }
        return false;
    }
}
