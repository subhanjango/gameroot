<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
    $this->__Module="Categories";
    $this->__Model="Categories";
    $this->__Directory="Categories";
    $this->__pKey="id";
}

public function index(){
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']="Categories";
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['Categories']=Categories::with('creator')->get();
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
        'title' => 'required|unique:categories,title|string'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        $Categories = new Categories;
        $Categories->title = trim(ucfirst($request->title));
        $Categories->created_by = trim(\Session::get('UserID'));
        $Categories->status = 1;
        $Categories->created_by = trim(\Session::get('UserID'));
        $Categories->save();
        \Session::flash('msg',$this->__Module.' Added.'); //<--FLASH MESSAGE
        return back();
        endif;
}

public function delete($ID){
Categories::destroy($ID);
\Session::flash('msg',$this->__Module.' Deleted.');
return back();
}

public function edit($ID){
    $__dataAssign['Action']=\URL::to($this->__Module.'/Update');
    $__dataAssign['Title']="Edit Category";
    $__dataAssign['Method']="Post";
    $__dataAssign['Categories']=Categories::find($ID);
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function update(Request $request){
    $validator = \Validator::make($request->all(), [
        'title' => 'required|string'
    ]);
        if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
        else:
        $Categories = Categories::find($request->input('edit_id'));

        $Categories->title = trim(ucfirst($request->input('title')));

        $Categories->update();

        \Session::flash('msg',$this->__Module.' Updated.');
        return back();
        endif;
}

public function status(Request $request){
    
    $Categories=Categories::find($request->input('id'));
    

    if($Categories->status == 1){
    $Categories->status=0;
    }else{
     $Categories->status=1;   
    }
    $Categories->save();
}
}
