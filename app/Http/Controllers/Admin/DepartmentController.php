<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{   
    public function department(){
        $data=Department::all();
        return view('admin.department',['departments'=>$data]);
      
    }

    public function savedepartment(Request $request){
        $dpname=$request['dpname'];
        $save=new Department();
        $save->name=$dpname;
        $save->save();  
}
public function getBydepartmentId(Request $request){
    $departmentId=$request['departmentId'];
    $getdepartment=Department::find($departmentId);
    return $getdepartment;


}

public function editdepartment(Request $request){
    $udpname=$request['udpname'];  
    $edit=Department::find($request['hdepartmentid']);
    $edit->name=$udpname;
    $edit->save();
    
    
    }
    public function deletedepartment(Request $request)
{
    $id=$request['id'];
    $delete = Department::find($id);
    $delete->delete();
    return redirect('admin.department');
}
 

  
}