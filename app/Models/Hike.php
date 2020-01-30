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
        return $this->belongsToMany(Destination::class);
    }

    public function states()
    {
        return $this->belongsTo(State::class);
    }
}
