<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Map;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map(){
        return view('admin.map');
 
 
    }
 
  
}