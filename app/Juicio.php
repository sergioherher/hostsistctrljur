<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juicio extends Model
{
    /**
     * Obtiene el cliente del juicio
     */
    public function client()
    {
        return $this->hasOne('App\Client');
    }

    /**
     * Obtiene el interno del juicio
     */
    public function intern()
    {
        return $this->hasOne('App\Intern');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function juzgado()
    {
        return $this->hasOne('App\Juzgado');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function juztipo()
    {
        return $this->hasOne('App\Juztipo');
    }

    /**
     * Obtiene la macroetapa del juicio
     */
    public function macroetapa()
    {
        return $this->hasOne('App\Macroetapa');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function demandados()
    {
        return $this->hasMany('App\Demandado');
    }
}
