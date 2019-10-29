<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::firstOrCreate([
            'name' => 'Xavier_Andrade',
            'email' => 'david.criollo14@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at'=>Carbon::now()
        ]);
        $user->assignRole('Administrador');
    }
}
