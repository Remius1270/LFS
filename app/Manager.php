<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
  public function managedTeams()
  {
    return $this->hasMany(Team::class);
  }

  public function createdScrims()
  {
    return $this->hasMany(Scrim::class);
  }

  public function managedPlannings()
  {
    return $this->hasMany(Planning::class);
  }
}
