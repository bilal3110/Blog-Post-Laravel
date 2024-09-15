<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = Users::paginate(4);
    //     $data = compact('users');
    //     return view('adminpanel.user')->with($data);
    // }

    // In UserController.php
public function index()
{
    if (auth()->check()) {
        $user = auth()->user();

        if ($user->role == 1) {
            // Admin
            $users = Users::paginate(10);
        } elseif ($user->role == 0) {
            // Contributor
            $users = Users::where('email', $user->email)->paginate(10);
        }

        $data = compact('users');
    return view('adminpanel.user')->with($data);
    } 
}

    public function userPage()
    {
        // $categories = Users::all();
        // $data = compact('categories');
        return view('adminpanel.add-user');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ]);

        $user = new Users();

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('user');
    }

    public function delUser($uid)
    {
        $user = Users::find($uid);
        $user->delete();
        return redirect()->route('user');
    }

    public function updateUser($uid)
    {
        $user = Users::find($uid);
        $data = compact('user');
        return view('adminpanel.update-user')->with($data);
    }

    public function editUser(Request $request, $uid)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required'
        ]);
    
        $user = Users::findOrFail($uid);
    
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
    
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->role = $request->input('role');
        $user->save();
    
        return redirect()->route('user')->with('success', 'User updated successfully');
    }
    
}
