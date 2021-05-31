<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'name'
  ];

  public static function hiker() {
    return Role::where('slug', 'hiker')->first();
  }

  public function users(){
    return $this->hasMany(User::class);
  }
}
