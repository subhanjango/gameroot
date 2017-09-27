<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
     protected $fillable = [
        'title', 'status' , 'created_at' , 'updated_at' , 'category_id'
    ];

		public function category(){
				return $this->belongsTo('App\Categories');
		}

		public function creator(){
				return $this->belongsTo('App\Admin','created_by','id');
		}
}
