<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\CoupanManagement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponManagementController extends Controller
{
    public function coupanmagement(){
        $data=CoupanManagement::all();
        return view('admin.couponmanagement',['coupanmanagements'=>$data]);
      
    }


 
    
 //save        
    
 public function savecoupanmanagement(Request $request){
    $validator = \Validator::make($request->all(), [
    //     'aname' => 'required',
    //     'aimge' => 'required',
    //     'adescription' => 'required',
        
    // ],[

        

    //     'aname.required' => 'amenity name should be provided Should Be provided!',
    //     'aimge.required' => 'amenity number should be provided Should Be provided!',
    //     'adescription.required' => 'Banquet name should be provided Should Be provided!',
       
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' =>$validator->errors()]);
    }
       
        $coupanmanagement=new CoupanManagement();
        $coupanmanagement->id= request('id');
        $coupanmanagement->title = request('ctitle');
        $coupanmanagement->c_description = request('c_description');
        $coupanmanagement->c_img = request('c_img');
        $coupanmanagement->cperiod = request('cperiod');
        $coupanmanagement->ceperiod = request('ceperiod');
        $coupanmanagement->c_code = request('c_code');
        $coupanmanagement->c_type = request('ctype');
        $coupanmanagement->c_value = request('coupan_value');
        $coupanmanagement->min_value = request('minimum_value');
        $coupanmanagement->max_value = request('maximum_value');
        $coupanmanagement->cl_user = request('Limited_per_user');
        $coupanmanagement->l_coupans = request('Limited_per_coupan');
        $coupanmanagement->c_status =0;
        $coupanmanagement->save();


        $file = $request->file('c_img');

        if ($file != null) {
        $name =$coupanmanagement->id.  time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('c_img')->getRealPath();
        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);
        $save=CoupanManagement::find($coupanmanagement->id);
        $save->c_img = $base64;
        $save->save();

    }
   
    
}
public function deletecoupanmanagement(Request $request)
{
    $id=$request['id'];
    $delete =CoupanManagement::find($id);
    $delete->delete();
    return redirect('admin.couponmanagement');
}


    //edit

public function getBycoupanmanagementId(Request $request){
$coupanmanagementId=$request['coupanmanagementId'];
$getcoupanmanagementDetail=CoupanManagement::find($coupanmanagementId);
    return response()->json($getcoupanmanagementDetail);

    
}
    
public function editcoupanmanagement(Request $request){
    $validator = \Validator::make($request->all(), [
        'uaname' => 'require',
        'uaimge' => 'required',
        'uadescription' => 'required',
      
       
        'uaname.required' => 'Banquet number should be provided Should Be provided!',
        'uaimge.required' => 'Banquet number should be provided Should Be provided!',
        'uadescription.required' => 'Banquet name should be provided Should Be provided!',
        
        
    ]);


    if ($validator->fails()) {
        return response()->json(['errors' =>$validator->errors()]);
    }
  
    $coupanmanagementid=$request['hcouponmanagementid'];
    $coupanmanagement=CoupanManagement::find($hcouponmanagementid);
    $coupanmanagement->id= request('id');
    $coupanmanagement->title = request('uctitle');
    $coupanmanagement->c_description = request('uc_description');
    $coupanmanagement->c_img= request('uc_img');
    $coupanmanagement->cperiod = request('ucperiod');
    $coupanmanagement->ceperiod = request('uceperiod');
    $coupanmanagement->c_code = request('uc_code');
    $coupanmanagement->c_type = request('uctype');
    $coupanmanagement->c_value = request('ucoupan_value');
    $coupanmanagement->min_value = request('uminimum_value');
    $coupanmanagement->max_value = request('umaximum_value');
    $coupanmanagement->cl_user = request('uLimited_per_user');
    $coupanmanagement->l_coupans = request('uLimited_per_coupn');
    $coupanmanagement->c_status = request('ucactive');
    $coupanmanagement->update();

    return response()->json('success');
    
}


 
  
}