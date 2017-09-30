<?php

namespace App\Http\Controllers;
use App\SubCategories;
use App\Categories;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
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
    $this->__Module="SubCategories";
    $this->__Model="SubCategories";
    $this->__Directory="SubCategories";
    $this->__pKey="id";
}

public function index(){
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']="Sub Categories";
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['SubCategories']=SubCategories::with('category','creator')->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function add(){

    $__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
    $__dataAssign['Title']="Add ".$this->__Module;
    $__dataAssign['Method']="Post";
    $__dataAssign['categories']=Categories::where('status',1)->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function __add(Request $request){


    $validator = \Validator::make($request->all(), [
        'title' => 'required|unique:sub_categories,title|string',
        'category' => 'required|integer'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        $SubCategories = new SubCategories;
        $SubCategories->title = trim(ucfirst($request->title));
        $SubCategories->category_id = trim($request->category);
        $SubCategories->created_by = trim(\Session::get('UserID'));
        $SubCategories->status = 1;

        $SubCategories->save();
        \Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
        return back();
        endif;
}

public function delete($ID){
SubCategories::destroy($ID);
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit Sub Category";
    $__dataAssign['Method']="Post";
    $__dataAssign['SubCategories']=SubCategories::find($ID);
    $__dataAssign['categories']=Categories::get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function update(Request $request){
    $validator = \Validator::make($request->all(), [
        'title' => 'required|string',
        'category' => 'required|integer'
    ]);
        if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
        else:
        $SubCategories = SubCategories::find($request->input('edit_id'));

        $SubCategories->title = trim(ucfirst($request->input('title')));
        $SubCategories->category_id = trim($request->input('category'));

        $SubCategories->update();

        \Session::flash('msg',$this->__Module.' Updated.');
        return back();
        endif;
}

public function status(Request $request){
    
    $SubCategories=SubCategories::find($request->input('id'));
    

    if($SubCategories->status == 1){
    $SubCategories->status=0;
    }else{
     $SubCategories->status=1;   
    }
    $SubCategories->save();
}
}
