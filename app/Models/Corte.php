<?php

namespace App\Models;

use App\Models\Admision\Cuestionario;
use App\Models\Maestria\CoordinadorCorte;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    public function maestria()
    {
        return $this->belongsTo(Maestria::class);
    }    


    // A:deivid
    // D:consulta de una inscripcion por id
    public function obtenerInscripcion($id)
    {
        $inscripcion=Inscripcion::find($id);
        if($inscripcion){
            return $inscripcion;
        }
        return null;
    }

    // A:deiviud
    // D: una corte tiene incripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }


    // A:Deivid
    // D: una cohorte tiene varios coordinadores asignados
    public function coordinadores()
    {
        return $this->belongsToMany(User::class, 'coordinador_cortes', 'corte_id', 'user_id');
    }
    

    // A:Deivid
    // Verificar si una corte tiene asignado el coordinador
    public function hasCoordinador($idCorte,$idUser)
    {
        $corte_coor=CoordinadorCorte::where(['corte_id'=>$idCorte,'user_id'=>$idUser])->first();
        if($corte_coor){
            return true;
        }return false;
    }

    // A:deivid
    // D:una cohorte tien un cuestionario de 10 preguntas
    public function cuestionario()
    {
        return $this->hasMany(Cuestionario::class);
    }
}
