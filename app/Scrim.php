<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
  /*public function planning()
  {
    return $this->belongsTo(Planning::class);
  }
*/
  public function team()
  {
    return $this->hasMany(Team::class);
  }
}
