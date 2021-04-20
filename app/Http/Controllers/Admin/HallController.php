<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Hall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function hall(){
        $data=Hall::all();
        return view('admin.Hall',['halls'=>$data]);
      
    
    }




    
    public function savehall(Request $request){

        $validator = \Validator::make($request->all(), [
        //     'fname' => 'required|max:20',
        //     'fnumber' => 'required|max:50',
        //     'fdescription' => 'required|max:60',

            
        // ],[
    
        // //     'fname.required' => 'Floor name should be provided Should Be provided!',
        // //     'fnumber.required' => 'Floor number should be provided Should Be provided!',
        //     'fdescription.required' => 'Floor description should be provided Should Be provided!',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
        $floor=$request['floor'];
        $halltype=$request['halltype'];
        $hnumber=$request['hnumber'];
        $save=new Hall();
        $save->Floortype=$floor;
        $save->halltype=$halltype;
        $save->hallnumber=$hnumber;
    
        $save->save();
 
    } 


    
    public function deletehall(Request $request)
            {
                $id=$request['id'];
                $delete = Hall::find($id);
                $delete->delete();
                return redirect('admin.hall');
            }


}