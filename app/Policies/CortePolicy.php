<?php

namespace App\Policies;

use App\Models\Corte;
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
        if($corte->estado!='Finalizado' && count($corte->cuestionario)<10){
            return true;
        }
        return false;
    }


    // A:deivid
    // D: ingresar notas de examen
    public function ingresarNotaExamen(User $user,Corte $corte)
    {
        if($corte->estado!='Finalizado'){
            return true;
        }
        return false;
    }


    // A:deivid
    // D: realizxar el registro de nuevo aspirante
    public function ingresarNuevoRegistro(User $user,Corte $corte)
    {
        if($corte->estado=='Finalizado'){
            return false;
        }
        return true;
    }
}
