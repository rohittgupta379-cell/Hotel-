<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function add_floor(){
        return view('floor');
    }

    // show floor 
    public function show_floor(){
        return view('floor');
    }
}
