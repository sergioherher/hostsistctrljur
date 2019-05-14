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
		$colaborador_role = Role::where('slug', 'colaborador')->first();

		$createJuicios = new Permission();
		$createJuicios->slug = 'crear-juicios';
		$createJuicios->name = 'Crear Juicios';
		$createJuicios->save();
		$createJuicios->roles()->attach($administrador_role);

		$editJuicios = new Permission();
		$editJuicios->slug = 'editar-juicios';
		$editJuicios->name = 'Editar Juicios';
		$editJuicios->save();
		$editJuicios->roles()->attach($administrador_role);

		$verJuicios = new Permission();
		$verJuicios->slug = 'ver-juicios';
		$verJuicios->name = 'Ver Juicios';
		$verJuicios->save();
		$verJuicios->roles()->attach($colaborador_role);

		$verJuicios = new Permission();
		$verJuicios->slug = 'ver-juicios';
		$verJuicios->name = 'Ver Juicios';
		$verJuicios->save();
		$verJuicios->roles()->attach($administrador_role);

    }
}
