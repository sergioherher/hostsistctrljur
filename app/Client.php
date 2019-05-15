<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * Establece la relación de un cliente a muchos juicios
     */
    public function juicio()
    {
        return $this->hasOne('App\Juicio');
    }
}
