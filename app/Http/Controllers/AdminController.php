<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $__Module;
    public  $__Model;
    public  $__Directory;
    public  $__pKey;
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
    $this->__Module="Admin";
    $this->__Model="Admin";
    $this->__Directory="Admin";
    $this->__pKey="id";
}

public function index(){
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']="Admins";
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['Admins']=Admin::where($this->__pKey,'>',1)->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function add(){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
    $__dataAssign['Title']="Add Admins";
    $__dataAssign['Method']="Post";
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function __add(Request $request){

    $validator = \Validator::make($request->all(), [
        'email' => 'required|unique:admins,admin_email|email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        $Admin = new Admin;
        $Admin->admin_email = trim($request->email);
        $Admin->admin_password = md5($request->password);
        $Admin->is_subadmin = 1;

        $Admin->save();
        \Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
        return back();
        endif;
}

public function delete($ID){
Admin::destroy($ID);
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit Admin";
    $__dataAssign['Method']="Post";
    $__dataAssign['Admins']=Admin::find($ID);
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function update(Request $request){
    $validator = \Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
        'confirm_password' => 'required|min:6|same:password',
    ]);
        if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
        else:
        $user = Admin::find($request->input('edit_id'));

        $user->admin_email = trim($request->input('email'));
        $user->admin_password = md5($request->input('password'));

        $user->save();

        \Session::flash('msg',$this->__Module.' Updated.');
        return back();
        endif;
}

public function status(Request $request){
    
    $Admin=Admin::find($request->input('id'));
    

    if($Admin->is_subadmin == 1){
    $Admin->is_subadmin=0;
    }else{
     $Admin->is_subadmin=1;   
    }
    $Admin->save();
}
}
