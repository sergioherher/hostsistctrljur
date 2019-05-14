<?php

use Illuminate\Database\Seeder;
use App\Intern;

class InternsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$intern = new Intern();
		$intern->name = 'JorgeAMJ';
		$intern->save();

		$intern = new Intern();
		$intern->name = 'SamLK';
		$intern->save();

		$intern = new Intern();
		$intern->name = 'MarcoRFP';
		$intern->save();

		$intern = new Intern();
		$intern->name = 'RocioMJ';
		$intern->save();
    }
}