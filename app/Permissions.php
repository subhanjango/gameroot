<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
     protected $fillable = [
        'group_id', 'subcategory_id'
    ];

    public function groups(){
    	return $this->belongsTo('App\Groups','group_id','id');
    }

    public function subcategory(){
    	return $this->belongsTo('App\SubCategories','subcategory_id','id');
    }
}
