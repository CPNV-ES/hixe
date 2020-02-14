<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'name'
  ];

  public function hikes(){
      return $this->hasMany(Hike::Class);
  }
}
