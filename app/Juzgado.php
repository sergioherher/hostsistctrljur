<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
    /**
     * Establece la relación de un cliente a muchos juicios
     */
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }

    public function juzgadotipo()
    {
        return $this->belongsTo('App\Juzgadotipo');
    }
}
