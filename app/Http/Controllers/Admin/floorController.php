<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Floor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class floorController extends Controller
{
    

    public function savefloor(Request $request){

        $validator = \Validator::make($request->all(), [
            'fname' => 'required|max:20',
            'fnumber' => 'required|max:50',
            'fdescription' => 'required|max:60',

            
        ],[
    
            'fname.required' => 'Floor name should be provided Should Be provided!',
            'fnumber.required' => 'Floor number should be provided Should Be provided!',
            'fdescription.required' => 'Floor description should be provided Should Be provided!',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
        $fname=$request['fname'];
        $fnumber=$request['fnumber'];
        $fdescription=$request['fdescription'];
        $factive=$request['factive'];
        $save=new Floor();
        $save->name=$fname;
        $save->floor_number=$fnumber;
        $save->description=$fdescription;
        $save->status=$factive;
        $save->save();

        
    }
    public function floor(){
        $data=Floor::all();
        return view('admin.floor',['floors'=>$data]);
      
    }

    public function getByfloorId(Request $request){
        $floorId=$request['floorId'];
        $getfloor=Floor::find($floorId);
        return $getfloor;

 
   }



    public function editfloor(Request $request){

        $ufname=$request['ufname'];
        $ufnumber=$request['ufnumber'];
        $ufdescription=$request['ufdescription'];
        $ufactive=$request['ufactive'];
        $edit=Floor::find($request['hfloorid']);
        $edit->name=$ufname;
        $edit->floor_number=$ufnumber;
        $edit->description=$ufdescription;
        $edit->status=$ufactive;
        $edit->save();

    
}
        public function deletefloor(Request $request)
        {
            $id=$request['id'];
            $delete = Floor::find($id);
            $delete->delete();
            return redirect('admin.floor');
        }


}