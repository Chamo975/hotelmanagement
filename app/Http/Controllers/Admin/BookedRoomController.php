<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\BookedRoom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookedRoomController extends Controller
{
    public function bookedroom(){
        return view('admin.bookedroom');
 
 
    }
 
  
}