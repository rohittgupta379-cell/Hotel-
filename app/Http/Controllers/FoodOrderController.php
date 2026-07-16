<?php

namespace App\Http\Controllers;

use App\Models\OrderFood;
use Illuminate\Http\Request;

class FoodOrderController extends Controller
{

    
    public function foodorder(Request $request)
    {
        $query = OrderFood::with('food');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('order_no', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('room_no', 'like', "%{$search}%");
            });
        }

        // Payment Status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Order Status
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        // Date Filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $orders = $query->latest()->paginate(10)->withQueryString();

        return view('food-orders', compact('orders'));
    }







    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required',
            'order_status'   => 'required',
        ]);

        $order = OrderFood::findOrFail($id);

        $order->update([
            'payment_status' => $request->payment_status,
            'order_status'   => $request->order_status,
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }
}
