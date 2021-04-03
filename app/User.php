<?php

namespace Laravel;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role',
    ];

    public function friendsOfMine(){
        return $this->belongsToMany('Laravel\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendsOf(){
        return $this->belongsToMany('Laravel\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends(){
        return $this->friendsOfMine->merge($this->friendsOf);
    }

    public function isOnline(){
        return Cache::has("online-" . $this->id);
    }
}