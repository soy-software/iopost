<?php

namespace App\Models\Domicilio;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    
    // A:Deivid
    // D: un canton tiene pertenece a una provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    // A:Deivid
    // D: un canton tiene varias parroquias
    public function parroquias()
    {
        return $this->hasMany(Parroquia::class);
    }
    
}
