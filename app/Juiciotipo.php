<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juiciotipo extends Model
{
    /**
     * Establece la relación de los tipos de juicio a juicios
     */
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
