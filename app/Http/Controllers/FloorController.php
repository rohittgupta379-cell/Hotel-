<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;

class FloorController extends Controller
{
    public function viewFloors()
    {
        return view('floor');
    }

    public function addFloor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existFloor = Floor::where('name', trim($request->name))->first();

        if ($existFloor) {
            return back()->with('error', 'Floor already exists');
        }

        Floor::create([
            'name' => trim($request->name),
        ]);

        return back()->with('success', 'Floor added successfully.');
    }

    // show floor 
    public function viewRooms()
    {
        return view('rooms');
    }
}
