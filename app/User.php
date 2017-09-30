<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'status', 
    ];

    public function creator(){
                return $this->belongsTo('App\Admin','created_by','id');
        }

            public function usergroups(){
                return $this->hasMany('App\UserGroups','user_id','id');
        }
        public static function myUsers(){
            return User::where('created_by',\Session::get('UserID'))->get();
        }
 public static function auth($credentials){


    $email=$credentials["email"];
   
    $pass=$credentials["password"];
   
    $user = \DB::table('users')
    ->where('email', $email)
    ->where('password', $pass)
    ->first();

    if(is_null($user)){
        return false;
        }else{
        return $user->id;
        }
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
