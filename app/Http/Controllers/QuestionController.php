<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Questions;
use App\SubCategories;
use App\Solutions;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    $this->__Module="Questions";
    $this->__Model="Questions";
    $this->__Directory="Question";
    $this->__pKey="id";
}

public function index(){
    $__dataAssign['Module']=$this->__Module;
    $__dataAssign['Title']="Questions";
    $__dataAssign['status_url']="$this->__Module/Status";
    $__dataAssign['Questions']=Questions::with('creator')->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function add(){

    $__dataAssign['Action']=\URL::to($this->__Module.'/Insert');
    $__dataAssign['Title']="Add ".$this->__Module;
    $__dataAssign['Method']="Post";
    $__dataAssign['subcategories'] = SubCategories::where('status',1)->get();
    return view($this->__Directory.'/'.__FUNCTION__,$__dataAssign);
}

public function __add(Request $request){


    $validator = \Validator::make($request->all(), [
        'subcategory' => 'required|string',
        'title' => 'required|unique:admins,admin_email|string',
        'description' => 'required|min:6',
        'solution' => 'required|min:6'
    ]);
    if($validator->fails()):
        return redirect()->back()->withErrors($validator->errors());
    else:
        //Insert Question + Solution
        $Questions = new Questions;
        $Questions->question_title = trim(ucfirst($request->title));
        $Questions->question_description = htmlspecialchars(trim($request->description));
        $Questions->subcategory_id = trim($request->subcategory);
        $Questions->created_by = trim(\Session::get('UserID'));
        $Questions->status = 1;

        $Questions->save();
        $insertedId = $Questions->id;
        //Insert it's solutions
       for ($i=0; $i < count($_POST['yes']) ; $i++) { 
          $yes[] = [
        'question_id' => $insertedId,
        'yes' => htmlspecialchars(trim($_POST['yes'][$i])),
        'no' => htmlspecialchars(trim($_POST['no'][$i]))
            ];
       }

      Solutions::insert($yes);
        
        
        
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
