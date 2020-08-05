<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  public $timestamps = false;

  protected $table = 'equipment';


  public function hikes(){
      return $this->belongsToMany(Hike::Class);
  }
}
