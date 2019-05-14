<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demandado extends Model
{
    /**
     * Establece la relación de demandado a juicios
     */
    public function juicio()
    {
        return $this->belongsTo('App\Juicio');
    }
}
