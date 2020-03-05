<?php

namespace App\Models;

use App\Models\Admision\Admision;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A:deivid
    // D: una inscripcion tiene un corte
    public function corte()
    {
        return $this->belongsTo(Corte::class);
    }


    // A:deivid
    // D:una incripcion tiene un solo admision
    public function admision()
    {
        return $this->hasOne(Admision::class,'inscripcion_id');
    }

    // A: deivid
    // D: una inscripcion tiene un pago de registro
    public function pagoRegistro()
    {
        return $this->hasOne(Pago::class,'inscripcion_id')->where('opcion','Registro');
    }
}
