<?php

namespace App\Http\Controllers;
use App\UserGroups;
use App\Permissions;
use App\Groups;
use App\User;
use Illuminate\Http\Request;

class UserPermissionsController extends Controller
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
    $this->__Module="User-Permissions";
    $this->__Model="Permissions";
    $this->__Directory="Permissions";
    $this->__pKey="id";
}

public function index(){
    
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']=$this->__Module;
    $__dataAssign['getGroups']="$this->__Module/getGroups";
    if(\Session::get('UserID') != 1){
    $__dataAssign['UserGroups']=Groups::where('created_by',\Session::get('UserID'))->where('status',1)->get();
	}else{
	$__dataAssign['UserGroups']=Groups::where('status',1)->get();
	}
    $__dataAssign['Permissions']=Permissions::with('groups','subcategory')->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function getGroups(Request $request){

 $UserIDs = UserGroups::where('group_id',$request->id)->get();
 $Users = array();
 foreach ($UserIDs as $value) {
 	# code...
 	$Users[] = User::find($value);

 }
 return $Users;
}

public function __add(Request $request){

    $validator = \Validator::make($request->all(), [
        'g_name' => 'required|unique:groups,group_title|string',
        'users' => 'array|required'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        $Groups = new Groups;
        $Groups->group_title = trim(ucfirst($request->g_name));
        $Groups->created_by = trim(\Session::get('UserID'));
        $Groups->status = 1;
        $Groups->save();
        $Groups->id;
     
        //Adding users to groups
        for ($i=0; $i < count($_POST['users']) ; $i++) { 
        	  $add_users[] = [
        'group_id' => $Groups->id,
        'user_id' => trim($_POST['users'][$i])
            ];
        }
		UserGroups::insert($add_users);
        
        \Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
        return back();
        endif;
}


}
