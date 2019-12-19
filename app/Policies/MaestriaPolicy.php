<?php

namespace App\Policies;


use App\Models\Maestria ;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaestriaPolicy
{
    use HandlesAuthorization;


    // A:Fabian
    // D: ????
    // D_deivid: crear cortes en la maestria cuando no existe auno en estado de Inscripciones
    public function crearCortesMaestria(User $user, Maestria $maestria)
    {
        $maes=$maestria->cortes()->where('cortes.estado','=','Registro')->count();
        if($maes>0){
            return false;
        }else{
            return true;
        }
    }
    
    // A:deivid
    // D: un usuario coordinador tiene maestrias asignados
    public function accederMisMaestrias(User $user)
    {
        if(count($user->cortes)>0 && $user->hasRole('Coordinador de maestría')){
            return true;
        }
    }

    // A:deivid
    // D: verificar maestria asignada a coordinador sea la correcta
    // public function verificarMaestria(User $user,Maestria $maestria)
    // {
    //     $ids_maestrias=$user->maestrias->pluck('id')->toArray();
    //     if(in_array($maestria->id,$ids_maestrias)){
    //         return true;
    //     }
    // }

}
