<?php

use Illuminate\Database\Seeder;
use App\Juiciouser;

class JuiciouserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 1;
		$juiciouser->user_id = 2;
		$juiciouser->role_id = 2;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 1;
		$juiciouser->user_id = 3;
		$juiciouser->role_id = 3;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 1;
		$juiciouser->user_id = 4;
		$juiciouser->role_id = 4;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 2;
		$juiciouser->user_id = 2;
		$juiciouser->role_id = 2;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 2;
		$juiciouser->user_id = 3;
		$juiciouser->role_id = 3;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 2;
		$juiciouser->user_id = 4;
		$juiciouser->role_id = 4;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 3;
		$juiciouser->user_id = 2;
		$juiciouser->role_id = 2;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 3;
		$juiciouser->user_id = 3;
		$juiciouser->role_id = 3;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 3;
		$juiciouser->user_id = 4;
		$juiciouser->role_id = 4;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 4;
		$juiciouser->user_id = 2;
		$juiciouser->role_id = 2;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 4;
		$juiciouser->user_id = 3;
		$juiciouser->role_id = 3;
		$juiciouser->save();

		$juiciouser = new Juiciouser();
		$juiciouser->juicio_id = 4;
		$juiciouser->user_id = 4;
		$juiciouser->role_id = 4;
		$juiciouser->save();

    }
}