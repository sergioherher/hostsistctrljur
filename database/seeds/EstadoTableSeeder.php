<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$estado = new Estado();
		$estado->estado = 'Activo';
		$estado->save();

		$estado = new Estado();
		$estado->estado = 'Concluido';
		$estado->save();

		$estado = new Estado();
		$estado->estado = 'Irrecuperable';
		$estado->save();

		$estado = new Estado();
		$estado->estado = 'Suspendido';
		$estado->save();
    }
}