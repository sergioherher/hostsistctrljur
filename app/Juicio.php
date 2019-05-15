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
        return $this->belongsTo('App\Client');
    }

    /**
     * Obtiene el interno del juicio
     */
    public function intern()
    {
        return $this->belongsTo('App\Intern');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function juzgado()
    {
        return $this->belongsTo('App\Juzgado');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function juztipo()
    {
        return $this->belongsTo('App\Juztipo');
    }

    /**
     * Obtiene la macroetapa del juicio
     */
    public function macroetapa()
    {
        return $this->belongsTo('App\Macroetapa');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function demandados()
    {
        return $this->hasMany('App\Demandado');
    }

    /**
     * Obtiene los documentos del juicio
     */
    public function doc_juicios()
    {
        return $this->hasMany('App\DocJuicio');
    }
}
