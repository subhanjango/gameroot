<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
     protected $fillable = [
        'title', 'status' , 'created_at' , 'updated_at' , 'category_id'
    ];


}
