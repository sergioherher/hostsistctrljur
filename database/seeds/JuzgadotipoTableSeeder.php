<?php

use Illuminate\Database\Seeder;
use App\Juzgadotipo;

class JuzgadotipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$juzgadotipo = new Juzgadotipo();
		$juzgadotipo->juztipo = 'No Definido';
		$juzgadotipo->save();

		$juzgadotipo = new Juzgadotipo();
		$juzgadotipo->juztipo = 'Primer Partido Judicial';
		$juzgadotipo->save();

		$juzgadotipo = new Juzgadotipo();
		$juzgadotipo->juztipo = 'Juzgados Foráneos';
		$juzgadotipo->save();

		$juzgadotipo = new Juzgadotipo();
		$juzgadotipo->juztipo = 'Juzgados Federales';
		$juzgadotipo->save();

		$juzgadotipo = new Juzgadotipo();
		$juzgadotipo->juztipo = 'Otros';
		$juzgadotipo->save();
    }
}