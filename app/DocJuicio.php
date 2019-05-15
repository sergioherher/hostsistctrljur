<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocJuicio extends Model
{
    public function juicio()
    {
        return $this->belongsTo('App\Juicio');
    }

    public function doc_tipo()
    {
        return $this->belongsTo('App\DocTipo');
    }
}
