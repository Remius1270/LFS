<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
  public function teams()
  {
    return $this->hasMany(Team::class);
  }
}
