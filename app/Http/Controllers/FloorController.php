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

        if (! $floor) {
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

    // update room

     public function updateroom(Request $request)
     {
         $request->validate([
             'id' => 'required|exists:rooms,id',
             'name' => 'required|string|max:255',
         ]);

         $room = Room::find($request->id);

         $room->name = trim($request->name);

         $room->save();

         return back()->with('success', 'Room updated successfully.');
     }

// delete room
  public function deleteroom($id)
  {
      $room = Room::find($id);

      if (! $room) {
          return back()->with('error', 'Room not found.');
      }

      $room->delete();

      return back()->with('success', 'Room deleted successfully.');
  }
}
