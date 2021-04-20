<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function room(){
        $data=Room::all();
        return view('admin.room',['rooms'=>$data]);
      
   
 
    } 



    public function saveroom(Request $request){

        $validator = \Validator::make($request->all(), [
        //     'fname' => 'required|max:20',
        //     'rtype' => 'required|max:50',
        //     'roomnumber' => 'required|max:60',

            
        // ],[
    
        //     'fname.required' => 'Floor name should be provided Should Be provided!',
        //     'rtype.required' => 'Floor number should be provided Should Be provided!',
        //     'roomnumber.required' => 'Floor description should be provided Should Be provided!',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
        $floortype=$request['floortype'];
        $roomtype=$request['roomtype'];
        $roomnumber=$request['roomnumber'];
       
        $save=new Room();
        $save->floorname=$floortype;
        $save->room_type=$roomtype;
        $save->room_number=$roomnumber;
        $save->save();

        
    }
    //edit

    public function getByroomId(Request $request){
        $roomId=$request['roomId'];
        $getroom=Room::find($roomId);
        return $getroom;

 
   }



    public function editroom(Request $request){

        $ufname=$request['ufname'];
        $urtype=$request['urtype'];
        $unumber=$request['unumber'];

        $edit=Room::find($request['hroomid']);
        $edit->floorname=$ufname;
        $edit->room_type=$urtype;
        $edit->room_number=$unumber;
        $edit->save();

    
}
        public function deleteroom(Request $request)
        {
            $id=$request['id'];
            $delete = Room::find($id);
            $delete->delete();
            return redirect('admin.room');
        }





}