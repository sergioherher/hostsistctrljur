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
		$coordinador_role = Role::where('slug', 'coordinador')->first();
		$administrar_perfiles_perm = Permission::where('slug','administrar-perfiles')->first();
		$create_juicios_perm = Permission::where('slug','cargar-juicios')->first();
		$editar_juicios_perm = Permission::where('slug','editar-juicios')->first();
		$ver_juicios_perm = Permission::where('slug','ver-juicios')->first();

		$administrador = new User();
		$administrador->name = 'Sergio Hernandez';
		$administrador->email = 'sergioh81@gmail.com';
		$administrador->password = bcrypt('123456');
		$administrador->save();
		$administrador->roles()->attach($administrador_role);
		$administrador->roles()->attach($colaborador_role);
		$administrador->roles()->attach($coordinador_role);
		$administrador->permissions()->attach($administrar_perfiles_perm);
		$administrador->permissions()->attach($create_juicios_perm);
		$administrador->permissions()->attach($editar_juicios_perm);
		$administrador->permissions()->attach($ver_juicios_perm);

		$coordinador = new User();
		$coordinador->name = 'Coordinador Prueba';
		$coordinador->email = 'coordinador.prueba@mailtrap.io';
		$coordinador->password = bcrypt('123456');
		$coordinador->save();
		$coordinador->roles()->attach($colaborador_role);
		$coordinador->roles()->attach($coordinador_role);
		$coordinador->permissions()->attach($create_juicios_perm);
		$coordinador->permissions()->attach($editar_juicios_perm);
		$coordinador->permissions()->attach($ver_juicios_perm);

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

		$administrador = new User();
		$administrador->name = 'Jorge AMJ';
		$administrador->email = 'jorgeAMJ@gmail.com';
		$administrador->password = bcrypt('123456');
		$administrador->save();
		$administrador->roles()->attach($administrador_role);
		$administrador->roles()->attach($colaborador_role);
		$administrador->roles()->attach($coordinador_role);
		$administrador->permissions()->attach($administrar_perfiles_perm);
		$administrador->permissions()->attach($create_juicios_perm);
		$administrador->permissions()->attach($editar_juicios_perm);
		$administrador->permissions()->attach($ver_juicios_perm);

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
