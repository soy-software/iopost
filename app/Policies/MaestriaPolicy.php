<?php

namespace App\Policies;

use App\Maestria;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaestriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any maestrias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the maestria.
     *
     * @param  \App\User  $user
     * @param  \App\Maestria  $maestria
     * @return mixed
     */
    public function view(User $user, Maestria $maestria)
    {
        //
    }

    /**
     * Determine whether the user can create maestrias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the maestria.
     *
     * @param  \App\User  $user
     * @param  \App\Maestria  $maestria
     * @return mixed
     */
    public function update(User $user, Maestria $maestria)
    {
        //
    }

    /**
     * Determine whether the user can delete the maestria.
     *
     * @param  \App\User  $user
     * @param  \App\Maestria  $maestria
     * @return mixed
     */
    public function delete(User $user, Maestria $maestria)
    {
        //
    }

    /**
     * Determine whether the user can restore the maestria.
     *
     * @param  \App\User  $user
     * @param  \App\Maestria  $maestria
     * @return mixed
     */
    public function restore(User $user, Maestria $maestria)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the maestria.
     *
     * @param  \App\User  $user
     * @param  \App\Maestria  $maestria
     * @return mixed
     */
    public function forceDelete(User $user, Maestria $maestria)
    {
        //
    }
}
