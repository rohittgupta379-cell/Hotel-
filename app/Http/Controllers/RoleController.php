<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    // Role List
    public function roles(Request $request)
    {
        $roles = Role::query();

        // Search
        if ($request->filled('search')) {
            $roles->where('role', 'like', '%' . $request->search . '%');
        }

        $roles = $roles->latest()->paginate(10);

        return view('rolepage', compact('roles'));
    }

    // Store Role
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:roles,role',
        ]);

        Role::create([
            'role' => $request->role,
        ]);

        return back()->with('success', 'Role added successfully.');
    }

    // Update Role
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|unique:roles,role,' . $id,
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'role' => $request->role,
        ]);

        return back()->with('success', 'Role updated successfully.');
    }

    // Delete Role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return back()->with('success', 'Role deleted successfully.');
    }
    
}