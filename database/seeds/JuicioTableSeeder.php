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
		$juicio->estado_id = 1;
		$juicio->numero_credito = 12345678;
		$juicio->juzgado_id = 10;
		$juicio->juzgadotipo_id = 2;
		$juicio->expediente = '2249/2017';
		$juicio->juiciotipo_id = 2;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-08-13 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->moneda_id = 1;
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 3;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->procesos_asoc = "Procesos asociados de prueba";
		$juicio->salaapela_id = 3;
		$juicio->toca = "Toca de prueba";
        $juicio->autoridad_amparo = "Autoridad amparo de prueba";
        $juicio->expediente_amparo = "Expediente amparo de prueba";
        $juicio->autoridad_recurso_amparo = "Autoridad recurso de amparo de prueba";
        $juicio->expediente_recurso_amparo = "Expediente recurso de amparo de prueba";
		$juicio->save();

		$juicio = new Juicio();
		$juicio->estado_id = 2;
		$juicio->numero_credito = 87654321;
		$juicio->juzgado_id = 45;
		$juicio->juzgadotipo_id = 3;
		$juicio->expediente = '123/2019';
		$juicio->juiciotipo_id = 4;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-07-13 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->moneda_id = 1;
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 2;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->procesos_asoc = "Procesos asociados de prueba";
		$juicio->salaapela_id = 1;
		$juicio->toca = "Toca de prueba";
        $juicio->autoridad_amparo = "Autoridad amparo de prueba";
        $juicio->expediente_amparo = "Expediente amparo de prueba";
        $juicio->autoridad_recurso_amparo = "Autoridad recurso de amparo de prueba";
        $juicio->expediente_recurso_amparo = "Expediente recurso de amparo de prueba";
		$juicio->save();

		$juicio = new Juicio();
		$juicio->estado_id = 2;
		$juicio->numero_credito = 87654321;
		$juicio->juzgado_id = 45;
		$juicio->juzgadotipo_id = 3;
		$juicio->expediente = '12341/2018';
		$juicio->juiciotipo_id = 4;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-06-30 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->moneda_id = 1;
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 2;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->procesos_asoc = "Procesos asociados de prueba";
		$juicio->salaapela_id = 1;
		$juicio->toca = "Toca de prueba";
        $juicio->autoridad_amparo = "Autoridad amparo de prueba";
        $juicio->expediente_amparo = "Expediente amparo de prueba";
        $juicio->autoridad_recurso_amparo = "Autoridad recurso de amparo de prueba";
        $juicio->expediente_recurso_amparo = "Expediente recurso de amparo de prueba";
        $juicio->audiencia_juicio  = "Audiencia de juicio de prueba";
		$juicio->save();

		$juicio = new Juicio();
		$juicio->estado_id = 2;
		$juicio->numero_credito = 87654321;
		$juicio->juzgado_id = 45;
		$juicio->juzgadotipo_id = 3;
		$juicio->expediente = '9123123/2019';
		$juicio->juiciotipo_id = 4;
		$juicio->ultima_fecha_boletin = '2019-05-13 00:00:00';
		$juicio->extracto = 'Extracto de prueba';
		$juicio->notas_seguimiento = 'Nota de seguimiento de prueba';
		$juicio->fecha_proxima_accion = '2019-12-30 00:00:00';
		$juicio->proxima_accion = "Proxima accion de prueba";
		$juicio->moneda_id = 1;
		$juicio->monto_demandado = 19234.90;
		$juicio->importe_credito = 6454.90;
		$juicio->macroetapa_id = 2;
		$juicio->garantia = "Garantias de Prueba";
		$juicio->datos_rpp = "Datos RPP de prueba";
		$juicio->otros_domicilios = "Otros domicilios de prueba";
		$juicio->procesos_asoc = "Procesos asociados de prueba";
		$juicio->salaapela_id = 1;
		$juicio->toca = "Toca de prueba";
        $juicio->autoridad_amparo = "Autoridad amparo de prueba";
        $juicio->expediente_amparo = "Expediente amparo de prueba";
        $juicio->autoridad_recurso_amparo = "Autoridad recurso de amparo de prueba";
        $juicio->expediente_recurso_amparo = "Expediente recurso de amparo de prueba";
        $juicio->audiencia_juicio  = "Audiencia de juicio de prueba";
		$juicio->save();
    }
}