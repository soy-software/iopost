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
        $data = array(
            'Administrador',
            'Coordinador de maestría',
            'Aspirante',
            'Tesorero'
        );
        
        if(in_array($role->name,$data)){
            return false;
        }else{
            return true;
        }
    }
}
