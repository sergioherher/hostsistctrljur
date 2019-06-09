<?php

use Illuminate\Database\Seeder;
use App\Demandado;

class DemandadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$demandado = new Demandado();
        $demandado->juicio_id = 1;
		$demandado->name = "ARREDONDO TIZNADO LUIS ALEJANDRO";
        $demandado->codemandado = 0;
		$demandado->save();

        $demandado = new Demandado();
        $demandado->juicio_id = 1;
        $demandado->name = "CHAVEZ LOPEZ JOSE SALVADOR";
        $demandado->codemandado = 1;
        $demandado->save();

        $demandado = new Demandado();
        $demandado->juicio_id = 2;
        $demandado->name = "AVILA CARRIZALES JANETTE";
        $demandado->codemandado = 0;
        $demandado->save();

        $demandado = new Demandado();
        $demandado->juicio_id = 3;
        $demandado->name = "AVILA RODRIGUEZ JANETTE";
        $demandado->codemandado = 0;
        $demandado->save();

        $demandado = new Demandado();
        $demandado->juicio_id = 4;
        $demandado->name = "AVILA CARRIZALES JANETTE";
        $demandado->codemandado = 0;
        $demandado->save();
    }
}