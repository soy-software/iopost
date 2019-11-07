<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    public function eliminar(User $user, Role $role)
    {
        if($role->name=='Administrador' || $role->name=='Estudiante'){
            return false;
        }else{
            return true;
        }
    }
}
