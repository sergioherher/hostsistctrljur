<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentenciasDictamen extends Model
{
    public function sentencia()
    {
        return $this->belongsTo('App\Sentencia');
    }
}
