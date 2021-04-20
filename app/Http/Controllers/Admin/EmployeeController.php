<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
 
    public function employees(){
        $data=Employee::all();
        return view('admin.employee',['employees'=>$data]);
      
    }

    //save        
    
    public function saveemployee(Request $request){
        $validator = \Validator::make($request->all(), [
            // 'title' => 'required',
            // 'firstname' => 'required',
            // 'lastname' => 'required',
            // 'username' => 'required',
            // 'eemail' => 'required',
            // 'epassword' => 'required',
            // 'ecpassword' => 'required',
            // 'edepartment' => 'required',
            // 'edesignation' => 'required',
            // 'ecountry' => 'required',
            // 'ereigon' => 'required',
            // 'ecity' => 'required',
            // 'eidtype' => 'required',
            // 'eidnumber' => 'required',
            // 'euploadidcard' => 'required',
            // 'eremark' => 'required',
            
        ],[
    
            // 'title.required' => 'amenity name should be provided Should Be provided!',
            // 'firstname.required' => 'Banquet name should be provided Should Be provided!',
            // 'lastname.required' => 'Banquet name should be provided Should Be provided!',
            // 'username.required' => 'Banquet name should be provided Should Be provided!',
            // 'eemail.required' => 'Banquet name should be provided Should Be provided!',
            // 'epassword.required' => 'Banquet name should be provided Should Be provided!',
            // 'ecpassword.required' => 'Banquet name should be provided Should Be provided!',
            // 'edepartment.required' => 'Banquet name should be provided Should Be provided!',
            // 'edesignation.required' => 'Banquet name should be provided Should Be provided!',
            // 'ecountry.required' => 'Banquet name should be provided Should Be provided!',
            // 'ereigon.required' => 'Banquet name should be provided Should Be provided!',
            // 'ecity.required' => 'Banquet name should be provided Should Be provided!',
            // 'eidtype.required' => 'Banquet name should be provided Should Be provided!',
            // 'eidnumber.required' => 'Banquet name should be provided Should Be provided!',
            // 'euploadidcard.required' => 'Banquet name should be provided Should Be provided!',
            // 'eremark.required' => 'Banquet name should be provided Should Be provided!',
            
            
           
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
           
            $employee=new Employee();
            $employee->id= request('id');
            $employee->title = request('title');
            $employee->firstname = request('firstname');
            $employee->lastname = request('lastname');
            $employee->username = request('username');
            $employee->email = request('eemail');
            $employee->password = request('epassword');
            $employee->confirmpassword = request('ecpassword');
            $employee->edepartment = request('edepartment');
            $employee->edesignation = request('edesignation');
            $employee->country = request('ecountry');
            $employee->reigon = request('ereigon');
            $employee->city = request('ecity');
            $employee->address = request('eaddress');
            $employee->idtype = request('eidtype');
            $employee->idnumber = request('eidnumber');
            $employee->e_img = request('euploadidcard');
            $employee->remark = request('eremark');
            $employee->save();

    
            $file = $request->file('euploadidcard');
            if ($file != null) {
            $name =$employee->id.  time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('euploadidcard')->getRealPath();
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $save=Employee::find($employee->id);
            $save->e_img = $base64;
            $save->save();
  
        }
       
        
    }


    public function deleteemployee(Request $request)
            {
                $id=$request['id'];
                $delete = Employee::find($id);
                $delete->delete();
                return redirect('admin.employee');
            }
            




//  //edit

    public function getByemployeeId(Request $request){
        $employeeId=$request['employeeId'];
        $Employee=Employee::find($employeeId);
           return response()->json($getemployeeDetail);
       
           
       }
    
public function editemployee(Request $request){
    $validator = \Validator::make($request->all(), [
        // 'uaname' => 'require',
        // 'uaimge' => 'required',
        // 'uadescription' => 'required',
      
       
        // 'uaname.required' => 'Banquet number should be provided Should Be provided!',
        // 'uaimge.required' => 'Banquet number should be provided Should Be provided!',
        // 'uadescription.required' => 'Banquet name should be provided Should Be provided!',
        
        
    ]);


    if ($validator->fails()) {
        return response()->json(['errors' =>$validator->errors()]);
    }
  
    $employeeid=$request['hemployeeid'];
    $employee=Employee::find($hemployeeid);
    $employee->id= request('id');
    $employee->title = request('utitle');
    $employee->firstname = request('ufirstname');
    $employee->lastname= request('ulastname');
    $employee->username = request('uusername');
    $employee->email = request('uemail');
    $employee->password = request('upassword');
    $employee->confirmpassword = request('ucpassword');
    // $employee->country = request('udepartment');
    // $employee->reigon = request('udesignation');
    $employee->country = request('ucountry');
    $employee->reigon = request('ureigon');
    $employee->city = request('ucity');
    $employee->address = request('uaddress');
    $employee->idtype = request('uidtype');
    $employee->idnumber = request('uidnumber');
    $employee->e_img = request('uuploadidcard');
    $employee->remark = request('uremark');
    $employee->update();
    return response()->json('success');
    
}
 
            

}
