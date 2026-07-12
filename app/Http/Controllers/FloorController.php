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
        return view('floor', ['floors' => $floors, 'rooms' => $rooms]);
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

    public function deleteFloor($id)
    {
        $floor = Floor::find($id);

        if (!$floor) {
            return back()->with('error', 'Floor not found.');
        }

        $floor->delete();

        return back()->with('success', 'Floor deleted successfully.');
    }


    public function updateFloor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id' => ['required', 'exists:floors,id'],
        ]);

        $floor = Floor::find($request->id);
        $floor->name = $request->name;
        $floor->save();

        return back()->with('success', 'Floor updated successfully.');
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
