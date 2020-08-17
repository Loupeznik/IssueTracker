<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Priority;
use App\Type;
use Illuminate\Http\Request;

class IssueController extends Controller
{

    public function index()
    {
        $active = Issue::where('status_id', 1)->orderBy('priority_id', 'asc')->take(10)->get();
        $resolved = Issue::where('status_id', 2)->orderBy('updated_at', 'asc')->take(10)->get();

        return view('issue.issues', compact(['active', 'resolved']));
    }

    public function create()
    {
        $types = Type::all();
        $priorities = Priority::all();
        return view('issue.create', compact(['types', 'priorities']));
    }

    public function store(Request $request)
    {
        Issue::create($this->validateInput($request));

        return redirect('/issues');
    }

    public function show(Issue $issue)
    {
        return view('issue.detail', compact('issue'), ['id' => $issue->id]);
    }

    public function edit(Issue $issue)
    {
        $types = Type::all();
        $priorities = Priority::all();
        return view('issue.update', compact(['issue','types','priorities']));
    }

    public function update(Request $request, Issue $issue)
    {
        $issue->update(($this->validateInput($request)));
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect('/issues');
    }

    public function list() {
        
    }

    public function validateInput($input) {

        return $input->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000'],
            'types_id' => 'required',
            'priority_id' => 'required'
        ]);

    }
}
