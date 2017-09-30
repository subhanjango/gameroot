<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{

	public $timestamps = true;

   protected $fillable = [
        'group_title', 'status' , 'created_by'
    ];

   public function creator()
    {
	return $this->belongsTo('App\Admin','created_by','id');
	}

	 public function usergroups()
    {
	return $this->hasMany('App\UserGroups','group_id','id');
	}
}
