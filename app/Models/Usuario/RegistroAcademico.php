<?php

namespace App\Models\Usuario;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RegistroAcademico extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
