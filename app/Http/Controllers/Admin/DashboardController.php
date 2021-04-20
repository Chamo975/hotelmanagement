<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function registered(){

       $users=User::all();
       return view('admin.register')->with('users',$users);


   }
   public function registeredit(Request $request,$id)
   {
       $id=User::findOrFail($id);
       return view('admin.register-edit');
   }


   public function deleteuser(Request $request)
   {
       $id=$request['id'];
       $delete = User::find($id);
       $delete->delete();
       return redirect('admin.register');
   }

}
