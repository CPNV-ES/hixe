<?php

namespace App;

use App\Hike;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email_address', 'github_id', 'member_number', 'birthdate', 'password', 'remember_token', 'created_at', 'updated_at', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hikes(){
        return $this->belongsToMany(Hike::class)->withPivot('role_id')->orderBy('meeting_date','desc');
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    /**
     * Verify if the user has the role given by checking the slug
     * 
     * @var string
     * @return bool
     */
    public function hasRole($roleSlug){
        if($this->role->slug === $roleSlug){
            return true;
        }
        return false;
    }   
}
