<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Guest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function guest(){
        return view('admin.guest');
 
 
    }
 
  
}
