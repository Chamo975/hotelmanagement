<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Amenity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;





class AmenityController extends Controller
{
//return view    
public function amenities(){
    $data=Amenity::all();
    return view('admin.amenity',['amenities'=>$data]);
  
}

 //save        
    
        public function saveamenity(Request $request){
        $validator = \Validator::make($request->all(), [
            'aname' => 'required',
            'aimge' => 'required',
            'adescription' => 'required',
            
        ],[
    
            'aname.required' => 'amenity name should be provided Should Be provided!',
            'aimge.required' => 'amenity number should be provided Should Be provided!',
            'adescription.required' => 'Banquet name should be provided Should Be provided!',
           
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
           
            $amenity=new Amenity();
            $amenity->id= request('id');
            $amenity->name = request('aname');
            $amenity->a_img =request('aimge');
            $amenity->a_description = request('adescription');
            $amenity->a_status =0;
            $amenity->save();

            if($request->hasfile('aimge')){
                $file = $request->file('aimge');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/amenity',$filename);
                $amenity->a_img = $filename;
    
            }else{
                return $request;
                $amenity->a_img = '';
            }
    
            $amenity->save();
    
        
        }
       
        
    

    public function deleteamenity(Request $request)
    {
        $id=$request['id'];
        $delete = Amenity::find($id);
        $delete->delete();
        return redirect('admin.amenity');
    }


    //edit

    public function getByamenityId(Request $request){
        $amenityId=$request['amenityId'];
        $getamenityDetail=Amenity::find($amenityId);
           return response()->json($getamenityDetail);
       
           
       }
    
public function editamenity(Request $request){
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
  
    $amenityid=$request['hamenityid'];
    $amenity=Amenity::find($hamenityid);
    $amenity->id= request('id');
    $amenity->name = request('uaname');
    $amenity->a_image = request('uaimge');
    $amenity->a_description	= request('uadescription');
    $amenity->a_status = request('uaactive');
    $amenity->update();

    return response()->json('success');
    
}
 
  
    
}