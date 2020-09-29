<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JuiciosOficio extends Model
{
  public function juicio()
  {
      return $this->belongsTo('App\Juicio');
  }
}
