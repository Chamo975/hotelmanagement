<?php
namespace App\Http\Controllers\Admin;
// use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    public function contact(){

        return view('admin.sendemail');
 
    }

    public function contactSubmit(Request $request)
    {
        \Mail::send('emails.contactmail',[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'msg'=>$request->msg


        ],function($mail)use($request){
            $mail->from("chamodhaabc@gmail.com");
            $mail->to($request->email);
            
        });
        return "Message has been sent successful!";
    }
 
}
