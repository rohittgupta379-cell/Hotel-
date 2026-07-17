<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FloorMap;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // public function roompayment()
    // {
    //     $payments = Booking::with(['floorMap.room'])
    //                 ->latest()
    //                 ->paginate(10);

    //     return view('roompayment', compact('payments'));
    // }

    public function roompayment(Request $request)
    {
        $payments = Booking::with('floorMap');

        // Search
        if ($request->search) {
            $search = $request->search;

            $payments->where(function ($q) use ($search) {
                $q->where('primary_guest_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhereHas('floorMap', function ($query) use ($search) {
                      $query->where('room_no', 'like', "%{$search}%");
                  });
            });
        }

        // Status Filter
        if ($request->status) {
            $payments->where('payment_status', $request->status);
        }

        // Date Filter
        if ($request->from_date && $request->to_date) {
            $payments->whereBetween('check_in', [
                $request->from_date,
                $request->to_date,
            ]);
        }

        $payments = $payments->latest()->paginate(10);

        // Dashboard Cards
        $totalBookings = Booking::count();
        $paidBookings = Booking::where('payment_status', 'Paid')->count();
        $pendingBookings = Booking::where('payment_status', 'Pending')->count();
        $totalRevenue = Booking::where('payment_status', 'Paid')->sum('total_amount');

        return view('roompayment', compact(
            'payments',
            'totalBookings',
            'paidBookings',
            'pendingBookings',
            'totalRevenue'
        ));
    }

    public function markPaid($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->payment_status = 'Paid';
        $booking->save();

        return redirect()->back()->with('success', 'Payment marked as Paid.');
    }
 
    
}
