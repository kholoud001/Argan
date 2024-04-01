<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::where('role_id', 2)
            ->orderByDesc('created_at')
            ->get();

        $trashedUsers = User::onlyTrashed()->get();
//        dd($trashedUsers);

        return view('Admin.users', ['users' => $users, 'trashedUsers' => $trashedUsers]);
    }



    public function addForm(){
        return view('Admin.forms.add_user');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 2,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    

//    public function destroy($id)
//    {
//        $user = User::find($id);
//        if ($user) {
//            $user->delete();
//            return response()->json(['message' => 'User deleted successfully'], 200);
//        }
//        return response()->json(['message' => 'User not found'], 404);
//    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            return redirect()->back()->with('success', 'User restored successfully.');
        }
        return redirect()->back()->with('error', 'User not found.');
    }


}
