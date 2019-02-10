<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function hobby()
    {
    	return $this->belongsTo('App\Hobby');
    }
}
