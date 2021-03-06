<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JuiciosOficio extends Model
{
  public function juicio()
  {
      return $this->belongsTo('App\Juicio');
  }

  public function oficio()
  {
      return $this->belongsTo('App\Oficio');
  }
}
