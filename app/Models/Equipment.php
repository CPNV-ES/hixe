<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  public $timestamps = false;

  protected $table = 'equipments';

  protected $fillable = [
      'name'
  ];

  public function hikes(){
      return $this->belongsToMany(Hike::Class);
  }
}
