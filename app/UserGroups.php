<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
     protected $fillable = [
        'group_id', 'user_id' 
    ];

    public function parent()
    {
	return $this->belongsTo('App\Groups','group_id','id');
	}

	public function users()
    {
	return $this->belongsTo('App\User','user_id','id');
	}
}
