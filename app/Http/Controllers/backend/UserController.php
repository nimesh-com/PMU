<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view('backend.userlist', compact('Users'));
    }

    public function userEdit($id)
    {

        $User = User::where('id', $id)->firstOrFail();
        $Roles = Role::all();

        return view('backend.userEdit', compact('User', 'Roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $User = User::where('id', $id)->firstOrFail();

        $User->update($validated);

        return redirect('/userlist')->with('success', 'User updated successfully!');
    }

    public function userDelete($id)
    {
        $User = User::where('id', $id)->firstOrFail();
        $User->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
