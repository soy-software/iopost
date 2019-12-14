<?php

namespace App\Models\Admision;

use App\Models\Corte;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
   public function cohorte()
   {
    return $this->belongsTo(Corte::class,'corte_id');
   }
}
