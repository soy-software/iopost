<?php

namespace App\Models;

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
    
}
