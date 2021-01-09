<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Juicio extends Model
{

    use SoftDeletes;
    /**
     * Obtiene el juzgado del juicio
     */
    public function juzgado()
    {
        return $this->belongsTo('App\Juzgado');
    }

    public function juzgadotipo()
    {
        return $this->belongsTo('App\Juzgadotipo');
    }

    public function moneda()
    {
        return $this->belongsTo('App\Moneda');
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

    public function salaapela()
    {
        return $this->belongsTo('App\Salaapela');
    }

    public function sentencia()
    {
        return $this->hasOne('App\Sentencia');
    }

    /**
     * Obtiene el juzgado del juicio
     */
    public function demandados()
    {
        return $this->hasMany('App\Demandado');
    }

    public function juicios_oficios()
    {
        return $this->hasMany('App\JuiciosOficio');
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

    public function notas()
    {
        return $this->hasMany('App\Nota');
    }
}
