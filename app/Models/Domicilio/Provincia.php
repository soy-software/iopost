<?php

namespace App\Models\Domicilio;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function cantones()
    {
        return $this->hasMany(Canton::class);
    }
}
