<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }
    public function editar(User $user, User $model)
    {
        if($model->id!=$user->id){
            return true;
        }
    }
    public function eliminar(User $user, User $model)
    {
        if($model->id!=$user->id){
            return true;
        }
    }
}
