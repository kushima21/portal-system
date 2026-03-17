<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // DISPLAY ALL USERS
    public function index(Request $request)
    {
        $users = User::latest()->get();
        return view('user.user', compact('users'));
    }

    // STORE NEW USER
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:50',
            'contact_number' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'school_id' => $request->school_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'school_id' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'gender' => 'nullable|string|max:50',
            'contact_number' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email,' . $id . ',user_id',
            'role' => 'required',
            'password' => 'nullable|min:6', // optional sa edit
        ]);

        $updateData = [
            'school_id' => $request->school_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // update password only if entered
        if($request->password){
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    // DELETE USER
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}