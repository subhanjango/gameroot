<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{

	public $timestamps = true;
	
    protected $fillable = [
        'question_id', 'yes' , 'no' , 'updated_at' , 'category_id'
    ];

    public function question(){
    	$this->belongsTo('App\Solutions');
    }
}
