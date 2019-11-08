<?php

namespace App\Policies;

use App\Corte;
use App\Models\Maestria;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CortePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cortes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the corte.
     *
     * @param  \App\User  $user
     * @param  \App\Corte  $corte
     * @return mixed
     */
    public function view(User $user, Corte $corte)
    {
        //
    }

    /**
     * Determine whether the user can create cortes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function crearCortes(User $user,Maestria $maestria)
    {
        $maestr=$maestria->cortes->where('estado'=='Inscripcion');
        if($maestr->count()>0){
            return false;
        }
    }

    /**
     * Determine whether the user can update the corte.
     *
     * @param  \App\User  $user
     * @param  \App\Corte  $corte
     * @return mixed
     */
    public function actualizarCorteEstado(User $user, Corte $corte)
    {
       
    }

    /**
     * Determine whether the user can delete the corte.
     *
     * @param  \App\User  $user
     * @param  \App\Corte  $corte
     * @return mixed
     */
    public function delete(User $user, Corte $corte)
    {
        //
    }

    /**
     * Determine whether the user can restore the corte.
     *
     * @param  \App\User  $user
     * @param  \App\Corte  $corte
     * @return mixed
     */
    public function restore(User $user, Corte $corte)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the corte.
     *
     * @param  \App\User  $user
     * @param  \App\Corte  $corte
     * @return mixed
     */
    public function forceDelete(User $user, Corte $corte)
    {
        //
    }
}
