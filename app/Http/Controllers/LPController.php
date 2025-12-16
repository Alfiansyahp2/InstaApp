<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPController extends Controller
{
    //public function pedagang()
    public function lp(){
        return view('landingpage.home');
    }

}
