<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserAuthController extends Controller
{

    public function __construct()
    {	$data =array();
        $data['Title']='Welcome';
    }

    public function login(){
    	$data['action']='Users/loguser';
    	$data['method']='POST';
    	return view('Frontend/'.__FUNCTION__,$data);
    }

    public function auth(Request $request){
        $validator = \Validator::make(
            ['email' => 'required|string|email|max:255'],
            ['password' => ['required|string|min:6|confirmed']]
        );
    	
    	 if($validator->fails()){
    	 	return redirect()->back()->withErrors($validator->errors());
    	 }else{
    	 	
    	 	$credentials['email']=trim($request->email);
    	 	$credentials['password']=md5($request->password);
    	 	$Verification=User::auth($credentials);
    	 	
    	 	if($Verification != false){
                $getStatus=User::find($Verification);
                if($getStatus->status){
                  \Session::put('User', $Verification);
                  return redirect('/Users');
                }else{
return back()->withErrors('Your account has been blocked , Contact Admin.');
                }
    	 		
    	 		
    	 	}else{
    	 		return back()->withErrors('Invalid Credentials');
    	 	}
    	 }
    }
}
