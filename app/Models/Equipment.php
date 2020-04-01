<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
  public $timestamps = false;
  protected $casts = [
    'name' => 'array',
  ];

  public function hikes() {
      return $this->belongsToMany(Hike::class);
  }

}
