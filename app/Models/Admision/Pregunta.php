<?php

namespace App\Models\Admision;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    // A: deivid
    // D: una pregunta tiene una admision
    public function admision()
    {
        return $this->belongsTo(Admision::class);
    }
}
