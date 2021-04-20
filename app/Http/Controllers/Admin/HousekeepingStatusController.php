<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\HousekeepingStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousekeepingStatusController extends Controller
{
    public function hstatus(){
        $data=HousekeepingStatus::all();
        return view('admin.housekeepingstatus',['hstatuses'=>$data]);
      
    }


    public function savehousekeepingstatus(Request $request){
        $title=$request['title'];
        $smalldescription=$request['smalldescription'];
        $hactive=$request['hactive'];
        $save=new HousekeepingStatus();
        $save->title=$title;
        $save->smalldescription=$smalldescription;
        $save->status=$hactive;
        $save->save();
 
  
}

public function getByhouskeepingsId(Request $request){
    $houskeepingsId=$request['houskeepingsId'];
    $gethouskeeping=HousekeepingStatus::find($houskeepingsId);
    return $gethouskeeping;


}



public function edithouskeepings(Request $request){

    $uhtitle=$request['uhtitle'];
    $uhdescription=$request['uhdescription'];
    $uhactive=$request['uhactive'];
    $edit=HousekeepingStatus::find($request['hhkid']);
    $edit->title=$uhtitle;
    $edit->smalldescription=$uhdescription;
    $edit->status=$uhactive;
    $edit->save();


}

public function deletehousekeepings(Request $request)
{
    $id=$request['id'];
    $delete = HousekeepingStatus::find($id);
    $delete->delete();
    return redirect('admin.housekeepingstatus');
}



}