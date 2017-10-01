<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;
use App\Permissions;
use App\User;
use App\SubCategories;
use App\Categories;
use App\Questions;
use App\Solutions;
use App\Userpath;
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
public function index($listing = NULL){
	if(!is_null($listing)){
		$data["listing"]=$listing;
	}

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
		$UserGroups=UserGroups::where('user_id',$this->userKey())->get();
		$myGroups = array();
		foreach ($UserGroups as $value) {
			# code...
			$myGroups[] = $value->group_id; 
		}
		$allowedSubCategory=Permissions::with('subcategory')->whereIN('group_id',$myGroups)->get();
		$myCategories = array();
		foreach ($allowedSubCategory as  $value) {
			# code...
			$myCategories[] = $value->subcategory->id; 
		}
		$data = Questions::where('question_title', 'like', '%' . trim(addslashes(ucfirst($request->input('str')))).'%')->where('status',1)->whereIn('subcategory_id',$myCategories)->get();

		if(!empty($data)):
			return $data;
		else:
			return 'Nothing found.';
		endif;
	}

	public function listing($slug){
		$slug = str_replace('-', ' ', $slug);
		$UserGroups=UserGroups::where('user_id',$this->userKey())->get();
		$myGroups = array();
		foreach ($UserGroups as $value) {
			# code...
			$myGroups[] = $value->group_id; 
		}
		$allowedSubCategory=Permissions::with('subcategory')->whereIN('group_id',$myGroups)->get();
		$myCategories = array();
		foreach ($allowedSubCategory as  $value) {
			# code...
			$myCategories[] = $value->subcategory->id; 
		}
	$result = SubCategories::where('title',$slug)->with('questions')->whereIn('id',$myCategories)->orderBy('created_at','DESC')->get();

	return $this->index($result);

	}

	public function solve($slug){
	 	$slug=str_replace('-', ' ', $slug);
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
		$data['User']=User::find($this->userKey());
	 	$data['question'] = Questions::where('question_title',$slug)->get();
	 	return view($this->__Directory.'/'.__FUNCTION__,$data);
	}

	public function initial($slug,$id,$question,$answerid=0){
		
		$slug = strtolower($slug);
		\Session::push('path', $slug);
		$question=str_replace('-', ' ', $question);
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
		$data['User']=User::find($this->userKey());
	 	$data['question'] = Questions::where('question_title',$question)->get();
	 	$data['answer'] = Solutions::where('question_id',$id)->where('id','>',$answerid)->first();
	 	$data['option'] = $slug;
	 	
	 	return view($this->__Directory.'/'.'answer',$data);

	}

	public function finalresult(Request $request){
		$Path=\Session::get('path');
		for ($i=0; $i < count($Path) ; $i++) { 
				$path[] = [
					'question_id' => $request->qid,
					'path' => trim(strtolower($Path[$i])),
					'solved' => $request->solved
				];
			}
			Userpath::insert($path);
		\Session::forget('path');
	}
}
