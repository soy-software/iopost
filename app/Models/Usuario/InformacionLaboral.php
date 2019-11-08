<?php

namespace App\Models\Usuario;

use App\Models\Domicilio\Parroquia;
use Illuminate\Database\Eloquent\Model;

class InformacionLaboral extends Model
{
    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
