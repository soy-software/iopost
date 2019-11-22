<?php

namespace App\Policies;

use App\Models\Usuario\RegistroAcademico;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistroAcademicoPolicy
{
    use HandlesAuthorization;

   
    public function editar(User $user, RegistroAcademico $registroAcademico)
    {
        if($registroAcademico->user->id==$user->id){
            return true;
        }
    }

    public function eliminar(User $user, RegistroAcademico $registroAcademico)
    {
        if($registroAcademico->user->id==$user->id){
            return true;
        }
    }

}
