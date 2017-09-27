<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{
    protected $fillable = [
        'question_id', 'yes' , 'no' , 'updated_at' , 'category_id'
    ];
}
