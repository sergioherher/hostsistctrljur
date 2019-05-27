<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaapela extends Model
{
   public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
