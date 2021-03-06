<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  public $timestamps = false;

  public function hikes(){
      return $this->belongsToMany(Hike::Class);
  }
}
