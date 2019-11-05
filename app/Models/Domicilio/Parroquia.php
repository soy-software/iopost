<?php

namespace App\Models\Domicilio;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    // A:Deivid
    // D: una parroquia pertenece a un canton
    public function canton()
    {
        return $this->belongsTo(Canton::class);
    }
}
