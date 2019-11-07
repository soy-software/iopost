<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Maestria;

class MateriaMaestria extends Model
{
    public function maestria()
    {
        return $this->belongsTo(Maestria::class,'maestria_id');
    }
}
