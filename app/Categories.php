<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	public $timestamps = true;
	
      protected $fillable = [
        'title', 'status' , 'created_at' , 'updated_at' , 'created_by'
    ];


 public function subcategories(){
 	$this->hasMany('App\SubCategories');
 }

  public function creator(){
 	return $this->belongsTo('App\Admin','created_by','id');
 }

}
