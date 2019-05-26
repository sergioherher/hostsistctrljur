<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
