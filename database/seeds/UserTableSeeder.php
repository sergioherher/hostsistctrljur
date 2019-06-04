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
		$cliente_role = Role::where('slug', 'cliente')->first();
		$create_juicios_perm = Permission::where('slug','cargar-juicios')->first();
		$editar_juicios_perm = Permission::where('slug','editar-juicios')->first();
		$ver_juicios_perm = Permission::where('slug','ver-juicios')->first();

		$administrador = new User();
		$administrador->name = 'Sergio Hernandez';
		$administrador->email = 'sergioh81@gmail.com';
		$administrador->password = bcrypt('123456');
		$administrador->save();
		$administrador->roles()->attach($administrador_role);
		$administrador->permissions()->attach($create_juicios_perm);
		$administrador->permissions()->attach($editar_juicios_perm);
		$administrador->permissions()->attach($ver_juicios_perm);

		$colaborador = new User();
		$colaborador->name = 'Pedro Colaborador';
		$colaborador->email = 'pedro.colaborador@mailtrap.io';
		$colaborador->password = bcrypt('123456');
		$colaborador->save();
		$colaborador->roles()->attach($colaborador_role);	
		$colaborador->permissions()->attach($editar_juicios_perm);
		$colaborador->permissions()->attach($ver_juicios_perm);

		$colaborador = new User();
		$colaborador->name = 'Colaborador Prueba';
		$colaborador->email = 'colaborador.prueba@mailtrap.io';
		$colaborador->password = bcrypt('123456');
		$colaborador->save();
		$colaborador->roles()->attach($colaborador_role);	
		$colaborador->permissions()->attach($editar_juicios_perm);
		$colaborador->permissions()->attach($ver_juicios_perm);

		$colaborador = new User();
		$colaborador->name = 'Jorge AMJ';
		$colaborador->email = 'jorgeAMJ@gmail.com';
		$colaborador->password = bcrypt('123456');
		$colaborador->save();
		$colaborador->roles()->attach($colaborador_role);	
		$colaborador->permissions()->attach($editar_juicios_perm);
		$colaborador->permissions()->attach($ver_juicios_perm);

		$cliente = new User();
		$cliente->name = 'BANORTE';
		$cliente->email = 'banorte@mailtrap.io';
		$cliente->password = bcrypt('123456');
		$cliente->save();
		$cliente->roles()->attach($cliente_role);
		$cliente->permissions()->attach($ver_juicios_perm);

		$cliente = new User();
		$cliente->name = 'BANESCO';
		$cliente->email = 'banesco@mailtrap.io';
		$cliente->password = bcrypt('123456');
		$cliente->save();
		$cliente->roles()->attach($cliente_role);
		$cliente->permissions()->attach($ver_juicios_perm);

		$cliente = new User();
		$cliente->name = 'Juan Perez';
		$cliente->email = 'juan.perez@mailtrap.io';
		$cliente->password = bcrypt('123456');
		$cliente->save();
		$cliente->roles()->attach($cliente_role);
		$cliente->permissions()->attach($ver_juicios_perm);

		$cliente = new User();
		$cliente->name = 'Fulanito de Tal';
		$cliente->email = 'fulanito@mailtrap.io';
		$cliente->password = bcrypt('123456');
		$cliente->save();
		$cliente->roles()->attach($cliente_role);
		$cliente->permissions()->attach($ver_juicios_perm);
    }
}
