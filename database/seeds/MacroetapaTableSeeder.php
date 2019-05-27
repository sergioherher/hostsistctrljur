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
		$macroetapa->macroetapa = 'POR DEMANDAR';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'JURISDICCION VOLUNTARIA';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'DEMANDA';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'EMPLAZADO';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ADMISION';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'AUD. PRELIMINAR';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'PRUEBAS';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ALEGATOS';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'AUD. JUICIO';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'SENTENCIA';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'APELACIÓN';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'AMPARO';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'AMPARO EN REVISIÓN';
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

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ESCRITURACIÓN';
		$macroetapa->save();

		$macroetapa = new Macroetapa();
		$macroetapa->macroetapa = 'ATIPICA VER NOTAS';
		$macroetapa->save();
    }
}