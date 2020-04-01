<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
  public $timestamps = false;
  protected $casts = [
    'certificate_number' => 'array',
    'description' => 'array',
  ];

  public function hikes() {
      return $this->belongsToMany(Hike::class);
  }

}
