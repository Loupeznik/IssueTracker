<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function userList()
    {
        $users = User::withCount('issues')->get();

        return view('admin.users.list', compact('users'));
    }

    public function removeUser($id)
    {
        User::where('id', $id)->delete();

        return redirect('/admin/user');
    }

    public function addUserForm()
    {
        return view('admin.users.new');
    }

    public function addUser(Request $request)
    {

        $this->validateInput($request);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'admin' => $request->admin
        ]);

        return redirect('/admin/user');
    }

    public function editUserForm($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.users.edit', compact('user'));
    }

    public function editUser($id, Request $request)
    {
        User::where('id', $id)->update($request->validate([
            'admin' => 'required'
        ]));

        return redirect('/admin/user');
    }

    
    public function validateInput($input) 
    {
        return $input->validate([
            'username' => 'required|min:3|max:20|unique:users',
            'name' => 'nullable|min:5|max:255',
            'password' => 'required|min:8',
            'email' => 'required|unique:users|email',
            'admin' => 'required'
        ]);
    }

}
