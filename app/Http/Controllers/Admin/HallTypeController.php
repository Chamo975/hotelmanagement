<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\HallType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HallTypeController extends Controller
{
    public function halltype(){
        $data=HallType::all();
        return view('admin.halltype',['halltypes'=>$data]);
      
    }

    public function savehalltype(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'sc' => 'required',
            'halldescription' => 'required',
            'baseoccupancy' => 'required',
            'higheroccupancy' => 'required',
            //'higheroccupancy' => 'required',
            'baseprice' => 'required',
            'halltypeimg' => 'required',
            
        ],[
    
            'name.required' => 'amenity name should be provided Should Be provided!',
            'sc.required' => 'amenity number should be provided Should Be provided!',
            'halldescription.required' => 'Banquet name should be provided Should Be provided!',
            'baseoccupancy.required' => 'Banquet name should be provided Should Be provided!',
            'higheroccupancy.required' => 'Banquet name should be provided Should Be provided!',
            // 'adescription.required' => 'Banquet name should be provided Should Be provided!',
            'baseprice.required' => 'Banquet name should be provided Should Be provided!',
            'halltypeimg.required' => 'Banquet name should be provided Should Be provided!',

            
           
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
           
            $halltype=new HallType();
            $halltype->id= request('id');
            $halltype->title = request('name');
            $halltype->sc = request('sc');
            $halltype->h_description = request('halldescription');
            $halltype->baseoccupancy =request('baseoccupancy');
            $halltype->higheroccupancy =request('higheroccupancy');
            $halltype->baseprice =request('baseprice');
            $halltype->halltypeimg =request('halltypeimg');
            $halltype->save();

    
          

        if($request->hasfile('halltypeimg')){
            $file = $request->file('halltypeimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/halltype',$filename);
            $halltype->halltypeimg = $filename;

        }else{
            return $request;
            $halltype->halltypeimg = '';
        }

        $halltype->save();
  
        
        
    }



    public function deletehalltype(Request $request)
    {
        $id=$request['id'];
        $delete = HallType::find($id);
        $delete->delete();
        return redirect('admin.halltype');
    }



    public function getByhalltypeId(Request $request){
        $halltypeId=$request['halltypeId'];
        $gethalltypeDetail=HallType::find($halltypeId);
           return response()->json($gethalltypeDetail);
       
           
       }
    
public function edithalltype(Request $request){
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
  
    $halltypeid=$request['hhalltypeid'];
    $halltype=HallType::find($hhalltypeid);
    $halltype->id=request('id');
    $halltype->title=request('uname');
    $halltype->h_description=request('uhalldescription');
    $halltype->baseoccupancyc=request('ubaseoccupancy');
    $halltype->baseoccupancyc=request('uhigheroccupancy');
    $halltype->baseoccupancyc=request('ubaseprice');
    $halltype->baseoccupancyc=request('uhalltypeimg');
    $halltype->update();

    return response()->json('success');
    
}










}