<?php

use Illuminate\Database\Seeder;
use App\Role, App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrar_perfiles_permission = Permission::where('slug','administrar-perfiles')->first();
        $cargar_juicios_permission = Permission::where('slug','cargar-juicios')->first();
        $editar_juicios_permission = Permission::where('slug','editar-juicios')->first();
		$ver_juicios_permission = Permission::where('slug', 'ver-juicios')->first();

		//RoleTableSeeder.php
		$administrador_role = new Role();
		$administrador_role->slug = 'administrador';
		$administrador_role->name = 'Administrador';
		$administrador_role->save();
		$administrador_role->permissions()->attach($administrar_perfiles_permission);
		$administrador_role->permissions()->attach($cargar_juicios_permission);
		$administrador_role->permissions()->attach($editar_juicios_permission);
		$administrador_role->permissions()->attach($ver_juicios_permission);

		$coordinador_role = new Role();
		$coordinador_role->slug = 'coordinador';
		$coordinador_role->name = 'Coordinador';
		$coordinador_role->save();
		$coordinador_role->permissions()->attach($cargar_juicios_permission);
		$coordinador_role->permissions()->attach($ver_juicios_permission);
		$coordinador_role->permissions()->attach($editar_juicios_permission);

		$colaborador_role = new Role();
		$colaborador_role->slug = 'colaborador';
		$colaborador_role->name = 'Colaborador';
		$colaborador_role->save();
		$colaborador_role->permissions()->attach($ver_juicios_permission);
		$colaborador_role->permissions()->attach($editar_juicios_permission);

		$cliente_role = new Role();
		$cliente_role->slug = 'cliente';
		$cliente_role->name = 'Cliente';
		$cliente_role->save();
		$cliente_role->permissions()->attach($ver_juicios_permission);
    }
}
