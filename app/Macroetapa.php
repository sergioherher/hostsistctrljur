<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Macroetapa extends Model
{
    /**
     * Establece la relación de macroetapas a juicios
     */
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
