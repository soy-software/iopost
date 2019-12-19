<?php

namespace App\Models\Admision;

use Illuminate\Database\Eloquent\Model;

class Admision extends Model
{
    // A:deivid
    // d:una admision tiene varios preguntas de cuestionario
    public function cuestionarios()
    {
        return $this->belongsToMany(Cuestionario::class, 'preguntas', 'admision_id', 'cuestionario_id')
        ->as('pregunta')
        ->withPivot(['id','nota','opcion']);
    }
}
