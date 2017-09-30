<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;
use App\Permissions;
use App\User;
use App\SubCategories;
use App\Categories;
use App\Questions;
class UserDashboardController extends Controller
{
    private $__Module;
    private  $__Directory;
    private  $__pKey;
    private $__UserKey;
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
    $this->__Module="Dashboard";
    $this->__Directory="Frontend";
    $this->__pKey="id";
    

}
public function userKey(){
	return  \Session::get('User');
}
public function index(){
		$data['Title']='';
		//fetching User Groups
		$data['UserGroups']=UserGroups::where('user_id',$this->userKey())->get();

		$myGroups = array();
		foreach ($data['UserGroups'] as $value) {
			# code...
			$myGroups[] = $value->group_id; 
		}
		$data['allowedSubCategory']=Permissions::with('subcategory')->whereIN('group_id',$myGroups)->get();
	
		//fetching the parent categories
		$myCategories = array();
		foreach ($data['allowedSubCategory'] as  $value) {
			# code...
			$myCategories[] = $value->subcategory->category_id; 
		}
		
		$data['allowedCategory']=Categories::with('subcategories')->whereIN('id',$myCategories)->get();
		$data['searchURL'] = 'Users/search';
		$data['User']=User::find($this->userKey());
		return view($this->__Directory.'/'.__FUNCTION__,$data);
	}

	public function search(Request $request){

		$data = Questions::where('question_title', 'like', '%' . trim(ucfirst($request->input('str'))).'%')->orWhere('question_description', 'like', '%' . trim(ucfirst($request->input('str'))).'%')->where('status',1)->get();

		if(!empty($data)):
			return $data;
		else:
			return 'Nothing found.';
		endif;
	}
}
