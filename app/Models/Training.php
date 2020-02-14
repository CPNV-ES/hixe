<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'certificate_number', 'description'
  ];

  public function hikes(){
      return $this->belongsToMany(Hike::Class);
  }
}
