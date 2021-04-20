<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\BookedHall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookedHallController extends Controller
{
    public function bookedhall(){
        return view('admin.bookedhall');
 
 
    }
 
  
}