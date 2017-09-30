<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{

	public $timestamps = true;
	
     protected $fillable = [
        'question_title', 'question_description'
    ];

    	public function solution(){
    		$this->hasMany('App\Solutions');
    	}

    public function creator(){
				return $this->belongsTo('App\Admin','created_by','id');
		}

		public function subcategories(){
				return $this->belongsTo('App\SubCategories','subcategory_id','id');
		}


}
