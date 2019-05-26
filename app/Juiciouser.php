<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juiciouser extends Model
{
    /**
     * Establece la relación de demandado a juicios
     */
    public function juicio()
    {
        return $this->belongsTo('App\Juicio');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'users_roles');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
