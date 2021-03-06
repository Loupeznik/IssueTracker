<?php

namespace App\Http\Controllers;

use App\User;
use App\Issue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use App\Http\Controllers\IssueController;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $user = $this->getUser();
        $issues = $this->allUserIssues($user);

        return view('account.dashboard', compact('user','issues'));
    }

    public function edit() 
    {
        $user = $this->getUser();

        return view('account.edit', compact('user'));
    }

    public function update(Request $request) 
    {

        $request->user()->update($request->validate([
            'name' => 'required',
            'email' => 'required'
        ]));

        return redirect('/account');
    }

    private function getUser() {
        return Auth::user();
    }

    private function allUserIssues(User $user) 
    {
        return Issue::where('user_id', $user->id)->orderBy('status_id', 'asc')->get();
    }

}
