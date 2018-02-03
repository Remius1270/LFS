<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function scrims()
  {
    return $this->hasMany(Scrim::class);
  }
}
