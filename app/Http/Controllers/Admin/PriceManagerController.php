<?php

namespace App\Http\Controllers\Admin;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceManagerController extends Controller{

public function pricemanager(){
    return view('admin./pricemanager');
  
}

}