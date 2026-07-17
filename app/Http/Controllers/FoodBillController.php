<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderFood;

class FoodBillController extends Controller
{
    // Food Bill List
    public function index(Request $request)
    {
        $query = OrderFood::query();

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

        // Payment Status Filter
        if ($request->filled('payment_status')) {

            $query->where('payment_status', $request->payment_status);

        }

        // Order Status Filter
        if ($request->filled('order_status')) {

            $query->where('order_status', $request->order_status);

        }

        // Date Filter
        if ($request->filled('from_date') && $request->filled('to_date')) {

            $query->whereBetween('created_at', [
                $request->from_date . ' 00:00:00',
                $request->to_date . ' 23:59:59',
            ]);

        }

        $bills = $query->latest()->paginate(10);

        // Dashboard Cards
        $totalOrders = OrderFood::count();

        $paidOrders = OrderFood::where('payment_status', 'Paid')->count();

        $pendingOrders = OrderFood::where('payment_status', 'Pending')->count();

        $deliveredOrders = OrderFood::where('order_status', 'Delivered')->count();

        $totalRevenue = OrderFood::where('payment_status', 'Paid')
            ->sum('total_price');

        return view('foodpayment', compact(
            'bills',
            'totalOrders',
            'paidOrders',
            'pendingOrders',
            'deliveredOrders',
            'totalRevenue'
        ));
    }

    // Mark Payment Paid
    public function markPaid($id)
    {
        $bill = OrderFood::findOrFail($id);

        $bill->payment_status = 'Paid';

        $bill->save();

        return back()->with('success', 'Payment marked as Paid successfully.');
    }

    // Mark Order Delivered
    public function markDelivered($id)
    {
        $bill = OrderFood::findOrFail($id);

        $bill->order_status = 'Delivered';

        $bill->save();

        return back()->with('success', 'Order Delivered Successfully.');
    }

    // Delete Bill
    public function destroy($id)
    {
        $bill = OrderFood::findOrFail($id);

        $bill->delete();

        return back()->with('success', 'Food Bill Deleted Successfully.');
    }
}