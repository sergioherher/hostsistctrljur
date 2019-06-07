<?php

use Illuminate\Database\Seeder;
use App\Moneda;

class MonedaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moneda = new Moneda();
        $moneda->desc_moneda = "No aplica";
        $moneda->save();

		$moneda = new Moneda();
		$moneda->desc_moneda = "MXN";
		$moneda->save();

        $moneda = new Moneda();
        $moneda->desc_moneda = "USD";
        $moneda->save();

        $moneda = new Moneda();
        $moneda->desc_moneda = "UDIS";
        $moneda->save();

        $moneda = new Moneda();
        $moneda->desc_moneda = "VSMV";
        $moneda->save();

        $moneda = new Moneda();
        $moneda->desc_moneda = "Otro";
        $moneda->save();
    }
}