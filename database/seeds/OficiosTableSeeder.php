<?php

use Illuminate\Database\Seeder;
use App\Nota;

class OficiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nota = new Nota();
    	$nota->juicio_id = 1;
    	$nota->user_id = 2;
    	$nota->nota = "Nota de prueba juicio 1";

    	$nota = new Nota();
    	$nota->juicio_id = 1;
    	$nota->user_id = 4;
    	$nota->nota = "Nota de prueba juicio 2";

    	$nota = new Nota();
    	$nota->juicio_id = 1;
    	$nota->user_id = 5;
    	$nota->nota = "Nota de prueba juicio 3";

    	$nota = new Nota();
    	$nota->juicio_id = 2;
    	$nota->user_id = 4;
    	$nota->nota = "Nota de prueba juicio 1";

    	$nota = new Nota();
    	$nota->juicio_id = 2;
    	$nota->user_id = 2;
    	$nota->nota = "Nota de prueba juicio 2";

    	$nota = new Nota();
    	$nota->juicio_id = 2;
    	$nota->user_id = 3;
    	$nota->nota = "Nota de prueba juicio 3";

    	$nota = new Nota();
    	$nota->juicio_id = 2;
    	$nota->user_id = 6;
    	$nota->nota = "Nota de prueba juicio 4";

    }

}
