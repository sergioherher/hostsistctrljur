<?php

use Illuminate\Database\Seeder;
use App\Role, App\Permission, App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador_role = Role::where('slug','administrador')->first();
		$colaborador_role = Role::where('slug', 'colaborador')->first();
		$administrador_create_juicios_perm = Permission::where('slug','create-juicios')->first();
		$administrador_editar_juicios_perm = Permission::where('slug','editar-juicios')->first();
		$administrador_ver_juicios_perm = Permission::where('slug','ver-juicios')->first();
		$colaborador_ver_juicios_perm = Permission::where('slug','ver-juicios')->first();

		$administrador = new User();
		$administrador->name = 'Sergio Hernandez';
		$administrador->email = 'sergioh81@gmail.com';
		$administrador->password = bcrypt('123456');
		$administrador->save();
		$administrador->roles()->attach($administrador_role);
		$administrador->permissions()->attach($administrador_create_juicios_perm);
		$administrador->permissions()->attach($administrador_editar_juicios_perm);
		$administrador->permissions()->attach($administrador_ver_juicios_perm);


		$colaborador = new User();
		$colaborador->name = 'Jorge AMJ';
		$colaborador->email = 'jorgeAMJ@gmail.com';
		$colaborador->password = bcrypt('123456');
		$colaborador->save();
		$colaborador->roles()->attach($colaborador_role);
		$colaborador->permissions()->attach($colaborador_ver_juicios_perm);
    }
}
