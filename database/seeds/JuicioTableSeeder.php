<?php

use Illuminate\Database\Seeder;
use App\Juicio;

class JuicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$juicio = new Juicio();
		$juicio->client_id = 1;
		$juicio->intern_id = 1;
		$juicio->numero_credito = 12345678;
		$juicio->juzgado_id = 10;
		$juicio->expediente = '2249/2017';
		$juicio->juztipo_id = 2;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-07-13 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 3;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->save();

		$juicio = new Juicio();
		$juicio->client_id = 1;
		$juicio->intern_id = 4;
		$juicio->numero_credito = 87654321;
		$juicio->juzgado_id = 9;
		$juicio->expediente = '123/2019';
		$juicio->juztipo_id = 4;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-07-13 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 2;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->save();
    }
}