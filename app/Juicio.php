<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juicio extends Model
{
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
    public function juiciotipo()
    {
        return $this->belongsTo('App\Juiciotipo');
    }

    /**
     * Obtiene la macroetapa del juicio
     */
    public function macroetapa()
    {
        return $this->belongsTo('App\Macroetapa');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
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

    public function juiciousers()
    {
        return $this->hasMany('App\Juiciouser');
    }
}
