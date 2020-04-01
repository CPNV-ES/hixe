<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
  public $timestamps = false;

  public function users()
  {
    return $this->belongsToMany(User::class)->withPivot('role_id');
  }

  public function guides()
  {
    return $this->users()->where('role_id', 1);
  }

  public function destinations()
  {
    return $this->belongsToMany(Destination::class)->withPivot('order');
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }
<<<<<<< HEAD
  public function equipment()
  {
    return $this->belongsToMany(Equipment::class);
  }
  public function trainings()
  {
    return $this->belongsToMany(Training::class);
  }
=======

  public function equipment()
  {
      return $this->belongsToMany(Equipment::class);
  }

  public function training() {
      return $this->belongsToMany(Training::class);
  }

>>>>>>> 8fd8921bff5452f8ad7d5a1f4530dd7b135fa7c8
}
