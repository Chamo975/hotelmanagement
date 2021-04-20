<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designation(){
        $data=Designation::all();
        return view('admin.designation',['designations'=>$data]);
      
    }
 
    public function savedesignation(Request $request){
        $dname=$request['dname'];
        $save=new Designation();
        $save->name=$dname;
        $save->save();  
}



public function getBydesignationId(Request $request){
    $designationId=$request['designationId'];
    $getdesignation=Designation::find($designationId);
    return $getdesignation;


}

public function editdesignation(Request $request){
$udname=$request['udname'];  
$edit=Designation::find($request['hdesignationid']);
$edit->name=$udname;
$edit->save();


}
public function deletedesignation(Request $request)
{
    $id=$request['id'];
    $delete = Designation::find($id);
    $delete->delete();
    return redirect('admin.designation');
}
}