<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public $timestamps = false;

    protected $fillable = [
        'firstname', 'lastname', 'email_address', 'member_number', 'birthdate', 'password', 'created_at', 'updated_at'
    ];

    
}
