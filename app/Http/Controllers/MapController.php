<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use App\Models\FloorMap;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function view()
    {
        // $floors = Floor::all();
        $floors = Floor::with(['floorMaps.room'])->get();
        $rooms = Room::all();
        $floorMaps = FloorMap::with('room', 'floor')->orderBy('room_no', 'asc')->get();
        return view('rooms', ['floors' => $floors, 'rooms' => $rooms, "floorMaps" => $floorMaps]);
    }

    public function addMap(Request $request)
    {
        $request->validate([
            'floor_id' => ['required', 'exists:floors,id'],
            'room_id' => ['required', 'exists:rooms,id'],
            'room_no' => ['required'],
        ]);

        $rooms = array_filter(array_map('trim', explode(',', $request->room_no)));

        foreach ($rooms as $roomNo) {
            FloorMap::create([
                'floor_id' => $request->floor_id,
                'room_id'  => $request->room_id,
                'room_no'  => $roomNo,
            ]);
        }

        return back()->with('success', 'Add Successfully');
    }


    // delete map 
    public function deleteMap($id)
    {
        $map = FloorMap::find($id);

        if (!$map) {
            return back()->with('error', 'Room map not found.');
        }

        $map->delete();

        return back()->with('success', 'Room map deleted successfully.');
    }
}
