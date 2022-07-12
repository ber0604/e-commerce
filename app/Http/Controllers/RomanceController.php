<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RomanceController extends Controller
{
    public function index(){
        return view('romance');
    }

}
