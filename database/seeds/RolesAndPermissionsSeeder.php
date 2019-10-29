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
        Permission::create(['name' => 'Usuarios']);


        // roles
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());

    }
}
