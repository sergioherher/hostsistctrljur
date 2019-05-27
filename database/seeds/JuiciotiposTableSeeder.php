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
		$juiciotipo = new Juiciotipo();
		$juiciotipo->juiciotipo = 'CIVIL';
		$juiciotipo->save();

		$juiciotipo = new Juiciotipo();
		$juiciotipo->juiciotipo = 'MERCANTIL';
		$juiciotipo->save();

		$juiciotipo = new Juiciotipo();
		$juiciotipo->juiciotipo = 'MERC. ORAL';
		$juiciotipo->save();

		$juiciotipo = new Juiciotipo();
		$juiciotipo->juiciotipo = 'JURISVOL';
		$juiciotipo->save();

		$juiciotipo = new Juiciotipo();
		$juiciotipo->juiciotipo = 'OTRO';
		$juiciotipo->save();
    }
}