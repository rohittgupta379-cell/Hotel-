<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Expense;
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

    // expensepayment
    public function expensepayment(Request $request)
    {
        $expenses = Expense::query();

        if ($request->filled('search')) {
            $expenses->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('type')) {
            $expenses->where('type', $request->type);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $expenses->whereBetween('date', [
                $request->from_date,
                $request->to_date,
            ]);
        }

        $expenses = $expenses->latest()->paginate(10);

        return view('expensepayment', compact('expenses'));
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'type' => 'required',
        'amount' => 'required|numeric',
        'date' => 'required|date',
    ]);

    Expense::create([
        'title' => $request->title,
        'description' => $request->description,
        'type' => $request->type,
        'amount' => $request->amount,
        'date' => $request->date,
    ]);

    return back()->with('success', 'Expense added successfully.');
}

public function destroy($id)
{
    $expense = Expense::findOrFail($id);

    $expense->delete();

    return redirect()->route('expenses.index')
        ->with('success', 'Expense deleted successfully.');
}

   
}
