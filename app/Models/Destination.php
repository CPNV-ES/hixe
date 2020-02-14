<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'location', 'latitude', 'longitude'
  ];
}
