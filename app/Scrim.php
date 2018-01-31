<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
  public function relatedPlanning()
  {
    return $this->belongsTo(Planning::class);
  }

  public function relatedTeam()
  {
    return $this->belongsTo(Team::class);
  }
}
