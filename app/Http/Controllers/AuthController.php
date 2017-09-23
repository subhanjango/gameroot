<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AuthController extends Controller
{

    public function __construct()
    {	$data =array();
        $data['Title']='Welcome';
    }

    public function login(){
    	$data['action']='logme';
    	$data['method']='POST';
    	return view(__FUNCTION__,$data);
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
    	 	$Verification=Admin::auth($credentials);
    	 	
    	 	if($Verification != false){
    	 		\Session::put('UserID', $Verification);
    	 		return redirect('dashboard');
    	 	}else{
    	 		return back()->withErrors('Invalid Credentials');
    	 	}
    	 }
    }
}
