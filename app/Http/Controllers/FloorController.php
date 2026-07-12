<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function viewFloors()
    {
        $floors = Floor::all();
        $rooms = Room::all();
        return view('floor',['floors' => $floors,'rooms' => $rooms]);
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

    // Add room


     public function viewRooms()
    {
        return view('rooms');
    }
    public function addRooms(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existRoom = Room::where('name', trim($request->name))->first();

        if ($existRoom) {
            return back()->with('error', 'Room type already exists.');
        }

        Room::create([
            'name' => trim($request->name),
        ]);

        return back()->with('success', 'Room type added successfully.');
    }

   
}
