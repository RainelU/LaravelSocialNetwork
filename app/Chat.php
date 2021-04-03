<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
    	'id',
    	'user_id',
    	'friend_id',
    	'user_name',
    	'friend_name',
    	'chat',
    ];
}
