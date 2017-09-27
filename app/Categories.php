<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
      protected $fillable = [
        'title', 'status' , 'created_at' , 'updated_at'
    ];


 public function subcategories(){
 	$this->hasMany('App\SubCategories');
 }

}
