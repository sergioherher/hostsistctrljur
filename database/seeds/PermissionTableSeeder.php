<?php

use Illuminate\Database\Seeder;
use App\Role, App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador_role = Role::where('slug','administrador')->first();
		$coordinador_role = Role::where('slug', 'coordinador')->first();
		$colaborador_role = Role::where('slug', 'colaborador')->first();
		$cliente_role = Role::where('slug', 'cliente')->first();

		$administrarPerfiles = new Permission();
		$administrarPerfiles->slug = 'administrar-perfiles';
		$administrarPerfiles->name = 'Administrar Perfiles';
		$administrarPerfiles->save();
		$administrarPerfiles->roles()->attach($administrador_role);

		$createJuicios = new Permission();
		$createJuicios->slug = 'cargar-juicios';
		$createJuicios->name = 'Cargar Juicios';
		$createJuicios->save();
		$createJuicios->roles()->attach($administrador_role);
		$createJuicios->roles()->attach($coordinador_role);

		$editJuicios = new Permission();
		$editJuicios->slug = 'editar-juicios';
		$editJuicios->name = 'Editar Juicios';
		$editJuicios->save();
		$editJuicios->roles()->attach($administrador_role);
		$editJuicios->roles()->attach($coordinador_role);
		$editJuicios->roles()->attach($colaborador_role);

		$verJuicios = new Permission();
		$verJuicios->slug = 'ver-juicios';
		$verJuicios->name = 'Ver Juicios';
		$verJuicios->save();
		$verJuicios->roles()->attach($colaborador_role);
		$verJuicios->roles()->attach($administrador_role);
		$verJuicios->roles()->attach($coordinador_role);
		$verJuicios->roles()->attach($cliente_role);

    }
}
