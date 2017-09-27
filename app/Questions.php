<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
     protected $fillable = [
        'question_title', 'question_description'
    ];

    	public function solution(){
    		$this->hasMany('App\Solutions');
    	}
}
