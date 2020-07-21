<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
  public $timestamps = false;

  public function hikes() {
      return $this->belongsToMany(Hike::class);
  }

}
