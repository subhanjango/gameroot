<?php  
	namespace App\Http\Controllers;


	use App\UserGroups;
	use App\Permissions;
	use App\Groups;
	use App\User;
	use App\SubCategories;
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
		$__dataAssign['getCategories']="$this->__Module/getPermissions";
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

		public function getPermissions(Request $request){

		$subCategoryIDs = Permissions::where('group_id',$request->id)->get();
		$subcategory = array();
		foreach ($subCategoryIDs as $value) {
	# code...
			$subcategory[] = SubCategories::find($value->subcategory_id);

		}
		return $subcategory;
	}

	public function add(){

		$__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
		$__dataAssign['Title']="Add ".$this->__Module;
		$__dataAssign['Method']="Post";
	//If admin is logged in
		if(\Session::get('UserID') != 1){
			$__dataAssign['Groups']=Groups::where('created_by',\Session::get('UserID'))->where('status',1)->get();
			$__dataAssign['Categories']=SubCategories::where('created_by',\Session::get('UserID'))->where('status',1)->get();
		}else{
			$__dataAssign['Groups']=Groups::where('status',1)->get();
			$__dataAssign['SubCategories']=SubCategories::where('status',1)->get();
		}

		return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
	}


	public function __add(Request $request){

		$validator = \Validator::make($request->all(), [
			'group' => 'required|integer',
			'subcategories' => 'array|required'
		]);
		if($validator->fails()):
			return redirect()->back()->withErrors($validator->errors());
		else:
			//authenticating groups
			for ($i=0; $i < count($_POST['subcategories']) ; $i++) { 
				$give_permissions[] = [
					'group_id' => $request->group,
					'subcategory_id' => trim($_POST['subcategories'][$i])
				];
			}
			Permissions::insert($give_permissions);

	\Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
	return back();
endif;
}

public function delete($ID){
$Permissions = Permissions::where('group_id',$ID);
$Permissions->delete();
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit Admin";
    $__dataAssign['Method']="Post";
    $__dataAssign['thisGroup']=Groups::find($ID);
    $__dataAssign['Permissions']=Permissions::where('group_id',$ID)->get();
    $permissionsOn = array();
    foreach ($__dataAssign['Permissions'] as $value) {
    	# code...
    	$permissionsOn[] = $value->subcategory_id;
    }
    $__dataAssign['Permissions'] = $permissionsOn;
    $__dataAssign['subcategories'] = SubCategories::where('status',1)->get();


    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function update(Request $request){
      $validator = \Validator::make($request->all(), [
        'subcategories' => 'required|array'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:

    	$Permissions = Permissions::where('group_id',$request->input('edit_id'));
		$Permissions->delete();
 
       for ($i=0; $i < count($_POST['subcategories']) ; $i++) { 
				$give_permissions[] = [
					'group_id' => $request->input('edit_id'),
					'subcategory_id' => trim($_POST['subcategories'][$i])
				];
			}
			Permissions::insert($give_permissions);
        
        \Session::flash('msg',$this->__Module.' Updated.'); //<--FLASH MESSAGE
        return back();
        endif;
}


}
