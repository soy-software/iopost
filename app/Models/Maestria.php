<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Corte;

class Maestria extends Model
{
    public function cortes()
    {
        return $this->hasMany(Corte::class,'maestria_id');
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

}
