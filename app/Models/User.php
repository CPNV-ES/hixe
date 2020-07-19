<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  public $timestamps = false;

  protected $fillable = [
    'firstname', 'lastname', 'email_address', 'github_id', 'member_number', 'birthdate', 'password', 'remember_token', 'created_at', 'updated_at'
  ];

  public function hikes(){
      return $this->belongsToMany(Hike::class)->withPivot('role_id')->orderBy('meeting_date','desc');
  }

}
