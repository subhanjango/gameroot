<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userpath extends Model
{
	protected $table = "user_path";
    //
    protected $fillable = [
        'question_id', 'solved' , 'path' 
    ];
}
