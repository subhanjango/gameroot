<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
     protected $fillable = [
        'question_title', 'question_description'
    ];

}
