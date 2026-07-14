<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingGuest;
use App\Models\FloorMap;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function checkIn(Request $request)
    {
        $request->validate([
            'floor_map_id' => 'required|exists:floor_maps,id',
            'primary_guest_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:15',
            'total_guests' => 'required|integer|min:1',
            'total_amount' => 'required|integer',
            'payment_status' => 'required',
        ]);

        $booking = new Booking;
        $booking->floor_map_id = $request->floor_map_id;
        $booking->primary_guest_name = $request->primary_guest_name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->total_guests = $request->total_guests;
        $booking->total_amount = $request->total_amount;
        $booking->payment_status = $request->payment_status;
        $booking->check_in = now();
        $booking->save();

        $room = FloorMap::find($request->floor_map_id);
        $room->is_available = false;
        $room->save();

        return back()->with('success', 'Booking is created.');
    }

    public function checkOut($id)
    {
        $booking = Booking::whereNull('check_out')->where('floor_map_id', $id)->first();
        if (! $booking) {
            return back()->with('error', 'Already Check Out.');
        }
        $booking->update([
            'check_out' => now(),
        ]);

        $room = FloorMap::find($id);
        $room->is_available = true;
        $room->save();

        return back()->with('success', 'Guest checked out successfully.');
    }

    public function addGuests(Request $request)
    {
        $request->validate([
            'floor_map_id' => 'required|exists:floor_maps,id',
            'guest_name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'id_type' => 'required|string|max:255',
            'id_no' => 'required|string|max:100',
            'front' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'back' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Get active booking for this room
        $booking = Booking::where('floor_map_id', $request->floor_map_id)
            ->whereNull('check_out')
            ->first();
            
        $guests = BookingGuest::where('booking_id', $booking->id)->count();

        if (! $booking) {
            return back()->with('error', 'No active booking found.');
        }

        if ($guests >= $booking->total_guests) {
            return back()->with('error', 'All guests have already been added.');
        }
        

        // Upload Front Image
        $frontImage = time().'_front.'.$request->front->extension();
        $request->front->move(public_path('guest_ids'), $frontImage);

        // Upload Back Image
        $backImage = time().'_back.'.$request->back->extension();
        $request->back->move(public_path('guest_ids'), $backImage);

        BookingGuest::create([
            'booking_id' => $booking->id,
            'name' => $request->guest_name,
            'age' => $request->age,
            'id_type' => $request->id_type,
            'id_number' => $request->id_no,
            'id_image_front' => $frontImage,
            'id_image_back' => $backImage,
        ]);

        return back()->with('success', 'Guest added successfully.');
    }

    public function bookingInfo($id)
    {
        $room = FloorMap::find($id);
        $booking = Booking::with('guests')->where('floor_map_id', $id)->whereNull('check_out')->first();
        return response()->json(['room' => $room,'booking' => $booking,]);
    }
}
