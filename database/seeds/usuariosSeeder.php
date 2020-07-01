<?php

use  App\User;
use  App\Roles;
use Illuminate\Database\Seeder;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Roles::truncate();
        DB::table('asignar_roles')->truncate();

        User::create([
            'name' => 'bryan',
            'email'=> 'bryan@gmail.com',
            'password' => 12345678
        ]);

        Roles::create([
            'rol_user' => 'administrador',
            'descrip_user' => 'administra'
        ]);
    }
}
