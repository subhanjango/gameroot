<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{

  public $timestamps = true;
    protected $fillable = [
        'admin_email', 'admin_password', 'is_subadmin',
    ];

    protected $hidden = [
        'admin_password'
    ];

    public function categories(){
      return $this->hasMany('App\Categories','created_by');
    }

     public function subcategories(){
      return $this->hasMany('App\SubCategories','created_by');
    }

    public function questions(){
      return $this->hasMany('App\Questions','created_by');
    } 

    public function admins(){
      return $this->hasMany('App\User','created_by');
    }

   public static function auth($credentials){


   	$email=$credentials["email"];
   
   	$pass=$credentials["password"];
   
  	$user = \DB::table('admins')
  	->where('admin_email', $email)
    ->where('admin_password', $pass)
  	->first();

    if(is_null($user)){
    	return false;
    	}else{
    	return $user->id;
    	}
    }
}
