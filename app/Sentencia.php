<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentencia extends Model
{
    public function juicio()
    {
        return $this->belongsTo('App\Juicio');
    }

    public function sentencias_dictamenes()
    {
        return $this->hasMany('App\SentenciasDictamen');
    }

    public function moneda()
    {
        return $this->belongsTo('App\Moneda');
    }
}
