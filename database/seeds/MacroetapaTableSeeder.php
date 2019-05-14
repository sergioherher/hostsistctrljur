<?php

use Illuminate\Database\Seeder;
use App\Macroetapa;

class MacroetapaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'DEMANDA';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ADMISION';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'PRUEBAS';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ALEGATOS';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'SENTENCIA';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'EJECUCION';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'REMATE';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'TOMA POSESION';
		$macroetapa->save();
    }
}