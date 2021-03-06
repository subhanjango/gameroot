<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{

	public $timestamps = true;
	
     protected $fillable = [
        'title', 'status' , 'created_at' , 'updated_at' , 'category_id'
    ];

		public function category(){
				return $this->belongsTo('App\Categories','category_id','id');
		}

		public function questions(){
			return $this->hasMany('App\Questions','subcategory_id','id');
		}

		public function creator(){
				return $this->belongsTo('App\Admin','created_by','id');
		}
}
