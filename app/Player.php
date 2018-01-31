<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function getTeam()
    {
      return $this->belongsTo(Team::class);
    }
}
