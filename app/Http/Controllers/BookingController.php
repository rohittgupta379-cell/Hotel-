<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FloorMap;
use App\Models\Booking;

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
        
        return back()->with('success','Booking is created.');
    }
}
