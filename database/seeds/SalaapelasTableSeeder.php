<?php

use Illuminate\Database\Seeder;
use App\Salaapela;

class SalaapelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$salaapela = new Salaapela();
		$salaapela->sala = 'TERCERA SALA';
		$salaapela->save();

		$salaapela = new Salaapela();
		$salaapela->sala = 'CUARTA SALA';
		$salaapela->save();

		$salaapela = new Salaapela();
		$salaapela->sala = 'QUINTA SALA';
		$salaapela->save();

		$salaapela = new Salaapela();
		$salaapela->sala = 'SÉPTIMA SALA';
		$salaapela->save();

		$salaapela = new Salaapela();
		$salaapela->sala = 'OCTAVA SALA';
		$salaapela->save();

		$salaapela = new Salaapela();
		$salaapela->sala = 'NOVENA SALA';
		$salaapela->save();
    }
}