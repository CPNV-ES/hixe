<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HikeType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
  
    public function hikes(){
        return $this->hasMany(Hike::class);
    }
}

