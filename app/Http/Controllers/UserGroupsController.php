<?php

namespace App\Http\Controllers;
use App\UserGroups;
use App\User;
use App\Groups;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
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
    $this->__Module="User-Groups";
    $this->__Model="Groups";
    $this->__Directory="UserGroups";
    $this->__pKey="id";
}

public function index(){
    
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']=$this->__Module;
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['UserGroups']=Groups::with('creator')->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function add(){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
    $__dataAssign['Title']="Add ".$this->__Module;
    $__dataAssign['Method']="Post";
    $__dataAssign['myUsers']=User::myUsers();
     return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
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

public function delete($ID){
Groups::destroy($ID);
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit ".$this->__Model;
    $__dataAssign['Method']="Post";
    $__dataAssign['Groups']=Groups::where('id', $ID)->get();
    $__dataAssign['GroupMembers']=UserGroups::with('users')->get();
    $usersSelected = array();
    //User ID's which are already selected
    foreach ($__dataAssign['GroupMembers'] as $value) {
    	# code...
    	$usersSelected[] = $value->users->id;
    }
  
  	$__dataAssign['GroupMembers'] = $usersSelected;
    $__dataAssign['Users']=User::get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function update(Request $request){
      $validator = \Validator::make($request->all(), [
        'g_name' => 'required|string',
        'users' => 'array|required'
    ]);
        if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
        else:
        $Groups = Groups::find($request->input('edit_id'));

        $Groups->group_title = trim(ucfirst($request->input('g_name')));

        $Groups->update();

		$Group = UserGroups::where('group_id',$request->input('edit_id'));
		$Group->delete();

		  //Adding users to groups
        for ($i=0; $i < count($_POST['users']) ; $i++) { 
        	  $add_users[] = [
        'group_id' => $Groups->id,
        'user_id' => trim($_POST['users'][$i])
            ];
        }
		UserGroups::insert($add_users);


        \Session::flash('msg',$this->__Module.' Updated.');
        return back();
        endif;
}

public function status(Request $request){
    
    $Groups=Groups::find($request->input('id'));
    

    if($Groups->status == 1){
    $Groups->status=0;
    }else{
     $Groups->status=1;   
    }
    $Groups->save();
}
}
