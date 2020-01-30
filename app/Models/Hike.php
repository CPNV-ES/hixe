<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
<<<<<<< HEAD
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
    return $this->belongsToMany(Destination::class);
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }
=======
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
        return $this->belongsToMany(Destination::class);
    }

    public function states()
    {
        return $this->belongsTo(State::class);
    }
>>>>>>> 08385abdf6f863c9374408941e50c2e85bc5187b
}
