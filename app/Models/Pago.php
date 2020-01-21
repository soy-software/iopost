<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    // A:deivid
    // D: un pago tiene un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
