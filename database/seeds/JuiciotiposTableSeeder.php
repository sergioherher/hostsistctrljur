<?php

use Illuminate\Database\Seeder;
use App\Juiciotipo;

class JuiciotiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$juztipo = new Juiciotipo();
		$juztipo->juztipo = 'CIVIL';
		$juztipo->save();

		$juztipo = new Juiciotipo();
		$juztipo->juztipo = 'MERCANTIL';
		$juztipo->save();

		$juztipo = new Juiciotipo();
		$juztipo->juztipo = 'MERC. ORAL';
		$juztipo->save();

		$juztipo = new Juiciotipo();
		$juztipo->juztipo = 'JURISVOL';
		$juztipo->save();
    }
}