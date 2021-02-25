<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Issue;
use App\Type;
use App\Status;
use APp\Priority;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function userList()
    {
        $users = User::all();

        return view('admin.users', compact($users));
    }

    public function removeUser(User $user)
    {
        $user->delete();

        return redirect('/admin/users');
    }

    public function addUser(Request $request)
    {
        //create new user from request data
    }

}
