<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function add_floor(){
        return view('admin.Add_Floor');
    }
}
