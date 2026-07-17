<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // show user table
    public function users(Request $request)
    {
        $users = User::with('role');

        if ($request->filled('search')) {
            $search = $request->search;

            $users->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role_id')) {
            $users->where('role_id', $request->role_id);
        }

        $users = $users->latest()->paginate(10);

        $roles = Role::all();

        return view('users', compact('users', 'roles'));
    }



    public function getUser($id)
    {
        $user = User::with('role')->where('id', $id)->first();

        return response()->json($user);
    }

 // Store User
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User Added Successfully.');
    }


    // update  user
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'role_id' => 'required|exists:roles,id',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;

        // Password update only if entered
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }
}
