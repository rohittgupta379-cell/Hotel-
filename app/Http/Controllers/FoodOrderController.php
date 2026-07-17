<?php

namespace App\Http\Controllers;

use App\Models\Food;
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
            'order_status' => 'required',
        ]);

        $order = OrderFood::findOrFail($id);

        $order->update([
            'payment_status' => $request->payment_status,
            'order_status' => $request->order_status,
        ]);

        return back()->with('success', 'Order status updated successfully.');
    }

    public function orderFood(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'name' => 'required|string|max:255',
            'mobile' => 'required',
            'quantity' => 'required|integer|min:1',
            'room_no' => 'required|exists:floor_maps,room_no',
            'payment_method' => 'required',
        ]);

        $food = Food::findOrFail($request->food_id);

        $order = new OrderFood();

        $order->order_no = 'ORD'.rand(1000, 9999);
        $order->food_id = $request->food_id;
        $order->name = $request->name;
        $order->mobile = $request->mobile;
        $order->quantity = $request->quantity;
        $order->total_price = $food->price * $request->quantity;
        $order->room_no = $request->room_no;
        $order->payment_method = $request->payment_method;
        $order->payment_status = 'Pending';
        $order->order_status = 'Pending';

        $order->save();

        return back()->with('success', 'Food order placed successfully.');
    }
}
