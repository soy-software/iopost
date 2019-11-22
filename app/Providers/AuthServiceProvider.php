<?php

namespace App\Providers;

use App\Models\Maestria;
use App\Policies\MaestriaPolicy;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Usuario\RegistroAcademico;
use App\Policies\CortePolicy;
use App\Policies\InscripcionPolicy;
use App\Policies\RegistroAcademicoPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class=>UserPolicy::class,
        Maestria::class=>MaestriaPolicy::class,
        Corte::class=>CortePolicy::class,
        Role::class=>RolePolicy::class,
        Inscripcion::class=>InscripcionPolicy::class,
        RegistroAcademico::class=>RegistroAcademicoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
