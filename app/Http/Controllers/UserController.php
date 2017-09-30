<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    $this->__Module="Users";
    $this->__Model="User";
    $this->__Directory="Users";
    $this->__pKey="id";
}

public function index(){
    
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']=$this->__Module;
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['Users']=User::with('creator')->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function add(){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
    $__dataAssign['Title']="Add ".$this->__Module;
    $__dataAssign['Method']="Post";
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function __add(Request $request){

    $validator = \Validator::make($request->all(), [
        'email' => 'required|unique:users,email|email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        $User = new User;
        $User->email = trim($request->email);
        $User->password = md5($request->password);
        $User->created_by = trim(\Session::get('UserID'));
        $User->status = 1;

        $User->save();
        \Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
        return back();
        endif;
}

public function delete($ID){
User::destroy($ID);
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit ".$this->__Model;
    $__dataAssign['Method']="Post";
    $__dataAssign['Users']=User::find($ID);
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
        $user = User::find($request->input('edit_id'));

        $user->email = trim($request->input('email'));
        $user->password = md5($request->input('password'));
        $user->update();

        \Session::flash('msg',$this->__Module.' Updated.');
        return back();
        endif;
}

public function status(Request $request){
    
    $User=User::find($request->input('id'));
    

    if($User->status == 1){
    $User->status=0;
    }else{
     $User->status=1;   
    }
    $User->save();
}
}
