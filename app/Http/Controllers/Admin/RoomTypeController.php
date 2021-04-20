<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\RoomType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function roomtype(){
        $data=RoomType::all();
        return view('admin.roomtype',['roomtypes'=>$data]);
      
    } 
    public function saveroomtype(Request $request){
        $validator = \Validator::make($request->all(), [
            
        //     'name' => 'required|max:30',
        //     'sc' => 'required|max:30',
        //     'email' => 'required|max:50',
        //     'room_description' => 'required|max:50',
        //     'baseoccupancy' => 'required|max:50',
        //     'kids_occupancy' => 'required|max:12',
        //     'extrabed' => 'required|max:100',
        //     'nationality' => 'required|max:100',
        //     'country' => 'required|max:100', 
        //     'selectgender' => 'required|max:10',
        // ], [
        //     'firstname.required' => 'First name should be provided!',
        //     'lastname.required' => 'Last name should be provided!',
        //     'email.required' => 'Email should be provided!',
        //     'idtype.required' => 'ID type should be provided',
        //     'uploadidcard.required' => 'Please Upload Your ID image',
        //     'mobile.required' => 'Mobile Number is required',
        //     'nationality.required' => 'category should be provided!',
        //     'country.required' => 'category should be provided!',
        //     'selectgender.required' => 'category should be provided!',
        //     'age.required' => 'category should be provided!',
            
        
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
        $roomtype=new RoomType();
        $roomtype->id= request('id');
        $roomtype->title = request('roomtype');
        $roomtype->short_code =request('sc');
        $roomtype->description =request('room_description');
        $roomtype->base_occupancy =request('baseoccupancy');
        $roomtype->higher_occupancy =request('higheroccupancy');
        // $roomtype->extra_bed =request('extra_bed');
        $roomtype->noofbeds =request('noofbeds');
        $roomtype->kids_occupancy =request('kids_occupancy');
        $roomtype->amenities =request('amenityname');
        $roomtype->base_price =request('base_price');
        $roomtype->additional_person_price = request('ap_price');
        $roomtype->extra_bed_price =request('extrab_price');
        $roomtype->image =request('roomtype_img');
        $roomtype->save();




        if($request->hasfile('roomtype_img')){
            $file = $request->file('roomtype_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/roomtype',$filename);
            $roomtype->image = $filename;

        }else{
            return $request;
            $roomtype->image = '';
        }

        $roomtype->save();






    






    

}

//delete

public function deleteroomtype(Request $request)
{
    $id=$request['id'];
    $delete = RoomType::find($id);
    $delete->delete();
    return redirect('admin.roomtype');
}




}