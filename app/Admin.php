<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model{

  
    protected $fillable = [
        'admin_email', 'admin_password', 'is_subadmin',
    ];

    protected $hidden = [
        'admin_password'
    ];

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
