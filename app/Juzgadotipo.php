<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgadotipo extends Model
{
   	public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }

    public function juzgado()
    {
        return $this->hasOne('App\Juzgado');
    }
}
