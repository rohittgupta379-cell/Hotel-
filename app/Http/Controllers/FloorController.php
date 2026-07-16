<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'type_of_room' => 'required|string|max:255',
            'type_of_bed' => 'required|string|max:255',
            'feature' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $existRoom = Room::where('name', trim($request->name))->first();

        if ($existRoom) {
            return back()->with('error', 'Room already exists.');
        }

        // Upload Image to storage/app/public/room_images
        // store() automatically generates a unique filename
        $imagePath = $request->file('image')->store('room_images', 'public');

        // Save Data
        Room::create([
            'name' => trim($request->name),
            'feature' => trim($request->feature),
            'room_type' => trim($request->type_of_room),
            'bed_type' => trim($request->type_of_bed),
            'image' => $imagePath, // This will store something like "room_images/filename.jpg"
        ]);

        return back()->with('success', 'Room added successfully.');
    }

    // Update Room
    public function updateroom(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'type_of_room' => 'required|string|max:255',
            'type_of_bed' => 'required|string|max:255',
            'feature' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $room = Room::findOrFail($request->id);

        $room->name = trim($request->name);
        $room->room_type = trim($request->type_of_room);
        $room->bed_type = trim($request->type_of_bed);
        $room->feature = trim($request->feature);

        // Image Update
        if ($request->hasFile('image')) {
            // Delete old image using Storage facade if it exists
            if ($room->image && Storage::disk('public')->exists($room->image)) {
                Storage::disk('public')->delete($room->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('room_images', 'public');
            $room->image = $imagePath;
        }

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
