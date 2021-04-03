<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
    	'user_id', 'friend_id',
    ];
}
