<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
         
        // permisos
        Permission::firstOrCreate(['name' => 'G. Usuarios']);
        Permission::firstOrCreate(['name' => 'G. Maestrías']);

        // roles
        $role = Role::firstOrCreate(['name' => 'Administrador']);
        Role::firstOrCreate(['name' => 'Coordinador de maestría']);
        Role::firstOrCreate(['name' => 'Aspirante']);
        $role->givePermissionTo(Permission::all());

    }
}
