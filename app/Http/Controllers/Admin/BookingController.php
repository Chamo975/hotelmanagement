<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(){
        return view('admin.booking');
 
 
    }
 
  
}
