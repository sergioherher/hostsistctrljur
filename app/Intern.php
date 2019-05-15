<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    /**
     * Establece la relación de un interno a juicios
     */
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
