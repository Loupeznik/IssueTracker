<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Priority;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;

class IssueController extends Controller
{

    public function __construct()
    {
        if (!Config::get('app.public')) $this->middleware('auth');
    }

    public function index()
    {
        $active = Issue::where('status_id', 1)->orderBy('priority_id', 'asc')->orderBy('created_at', 'desc')->take(10)->get();
        $resolved = Issue::where('status_id', 2)->orderBy('updated_at', 'asc')->take(10)->get();
        if (Auth::user()) {
            $userIssues = $this->userIssue(Auth::user());
            return view('issue.issues', compact(['active', 'resolved','userIssues']));
        }
        
        return view('issue.issues', compact(['active', 'resolved']));
        
    }

    public function create()
    {
        if ($this->isAuthenticated()) 
        {

            $types = Type::all();
            $priorities = Priority::all();
            return view('issue.create', compact(['types', 'priorities']));
        }
        return redirect('/issues');
    }

    public function store(Request $request)
    {
        if ($this->isAuthenticated()) 
        {
            $this->validateInput($request);

            Issue::create([
                'Name' => $request->Name,
                'user_id' => $request->user_id,
                'types_id' => $request->types_id,
                'priority_id' => $request->priority_id,
                'Desc' => $request->Desc
            ]);
        }

        return redirect('/issues');
    }

    public function show(Issue $issue)
    {
        return view('issue.detail', compact('issue'), ['id' => $issue->id]);
    }

    public function edit(Issue $issue)
    {
        if ($this->isAuthenticated())
        {
            $types = Type::all();
            $priorities = Priority::all();
    
            return view('issue.update', compact(['issue','types','priorities']));
        }
        return redirect('/issues');

    }

    public function update(Request $request, Issue $issue)
    {
        if ($this->isAuthenticated()) $issue->update($this->validateInput($request));

        return redirect('/issues');
    }

    public function destroy(Issue $issue)
    {
        if ($this->isAuthenticated()) $issue->delete();

        return redirect('/issues');
    }

    public function list() 
    {
        $issues = Issue::where('status_id', 1)->orderBy('priority_id', 'asc')->orderBy('updated_at', 'desc')->get();

        return view('issue.list', compact('issues'));
    }

    public function validateInput($input) 
    {
        return $input->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000'],
            'types_id' => 'required',
            'priority_id' => 'required'
        ]);
    }

    public function resolve(Issue $issue)
    {
        if ($this->isAuthenticated()) $issue->update(['status_id' => 2]);
        
        return redirect('/issues');
    }

    public function userIssue(User $user) 
    {
        return Issue::where('status_id', 1)->where('user_id', $user->id)->get();
    }

    public function isAuthenticated()
    {
        if (Auth::check()) return true;
        return false;
    }

}
