<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*controller belloe made it to open several view,in my case welcome view and about view. in this controller*/
/* i make 2 function , i use thoses function in WEB under ROUTES, i calle function by indicate the controller*/
class staticController extends Controller
{
    public function index(){
        return view ("welcome");
    }

    public function about(){
        return view ("about");
    }
    
}
