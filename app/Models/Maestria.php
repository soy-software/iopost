<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Corte;
use App\User;

class Maestria extends Model
{
    public function cortes()
    {
        return $this->hasMany(Corte::class,'maestria_id');
    }

    


    // A:deivid
    // D:una maestria tiene varios usuarios coordinadores asignados
    public function coordinadores()
    {
        return $this->belongsToMany(User::class, 'coordinador_maestrias', 'maestria_id', 'user_id');
    }    

}
