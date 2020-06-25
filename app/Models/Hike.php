<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
  public $timestamps = false;

  protected $fillable = [
      'name', 'meeting_location', 'meeting_date', 'beginning_date', 'ending_date', 'min_num_participants', 'max_num_participants', 'difficulty', 'additional_info', 'drop_in_altitude'
  ];

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

  public function equipment()
  {
    return $this->belongsToMany(Equipment::Class);
  }

  public function trainings()
  {
    return $this->belongsToMany(Training::Class);
  }
}
