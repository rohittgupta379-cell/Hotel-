<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\FloorMap;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Show all complaints

    public function complaints()
    {
        $complaints = Complaint::with('floorMap')->latest()->paginate(10);

        $rooms = FloorMap::where('is_available', 1)->get();

        return view('complaints', compact('complaints', 'rooms'));
    }



    public function complaintstore(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'complaint_type' => 'required',
            'complaint' => 'required',
            'status' => 'required',
        ]);

        Complaint::create([
            'room_id' => $request->room_id,
            'complaint_type' => $request->complaint_type,
            'complaint' => $request->complaint,
            'status' => $request->status,
        ]);

        return redirect()->back()
    ->with('success', 'Complaint added successfully');
    }



    public function updateStatus(Request $request, $id)
{
    $complaint = Complaint::findOrFail($id);

    $complaint->update([
        'status' => $request->status
    ]);

    return back()->with('success','Complaint updated successfully');
}



public function destroy($id)
{
    $complaint = Complaint::findOrFail($id);

    $complaint->delete();

    return redirect()->back()
        ->with('success', 'Complaint deleted successfully');
}
}
