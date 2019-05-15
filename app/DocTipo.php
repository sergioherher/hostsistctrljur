<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocTipo extends Model
{
    public function doc_juicio()
    {
        return $this->hasOne('App\DocJuicio');
    }
}
