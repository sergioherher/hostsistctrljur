<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    public function juicio()
    {
        return $this->belongsTo('App\Juicio');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
