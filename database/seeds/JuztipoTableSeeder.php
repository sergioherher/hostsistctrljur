<?php

use Illuminate\Database\Seeder;
use App\Juztipo;

class JuztipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$juztipo = new Juztipo();
		$juztipo->juztipo = 'CIVIL';
		$juztipo->save();

		$juztipo = new Juztipo();
		$juztipo->juztipo = 'MERCANTIL';
		$juztipo->save();

		$juztipo = new Juztipo();
		$juztipo->juztipo = 'MERC. ORAL';
		$juztipo->save();

		$juztipo = new Juztipo();
		$juztipo->juztipo = 'JURISVOL';
		$juztipo->save();
    }
}