<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\PaidServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaidServicesController extends Controller
{
     //return view 
    public function paidservices()
    {
       
    $data=PaidServices::all();
    return view('admin.paidservices',['paidservices'=>$data]);
  
    } 


    // save paidservices
    
    public function savepaidservices(Request $request){

        $validator = \Validator::make($request->all(), [
            // 'ptitle' => 'required|max:20',
            // 'pricetype' => 'required|max:50',
            // 'price' => 'required|max:60',
            // 'pactive' => 'required|max:60',
            // 'pdescriptionerror' => 'required|max:60',


            
        // ],[
    
        //     'ptitle.required' => 'Floor name should be provided Should Be provided!',
        //     'pricetype.required' => 'Floor number should be provided Should Be provided!',
        //     'price.required' => 'Floor description should be provided Should Be provided!',
        //     'pactive.required' => 'Floor description should be provided Should Be provided!',
        //     'pdescriptionerror.required' => 'Floor description should be provided Should Be provided!',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' =>$validator->errors()]);
        }
        $ptitle=$request['ptitle'];
        $pricetype=$request['pricetype'];
        $price=$request['price'];
        $pactive=$request['pactive'];
        $pdescription=$request['pdescription'];
        $psdescription=$request['psdescription'];
        $save=new PaidServices();
        $save->title=$ptitle;
        $save->p_type=$pricetype;
        $save->p_price=$price;
        $save->status=0;
        $save->p_description=$pdescription;
        $save->	ps_description=$psdescription;
        
        $save->save();

        


        

    }



         public function deletepaidservices(Request $request)
            {
                $id=$request['id'];
                $delete = PaidServices::find($id);
                $delete->delete();
                return redirect('admin.paidservices');
            }

}