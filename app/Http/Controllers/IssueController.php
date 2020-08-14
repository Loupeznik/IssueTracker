<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{

    public function index()
    {
        $issues = Issue::latest()->get();

        //return $issues;
        //return $issues->id;
        return view('issue.issues', compact('issues'));
    }

    public function create()
    {
        return view('issue.create');
    }

    public function store(Request $request)
    {
        Issue::create($request->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000'],
            'Type' => 'required',
            'Status' => 'required'
        ]));

        return redirect('/issues');
    }

    public function show(Issue $issue)
    {
        return view('issue.detail', compact('issue'), ['id' => $issue->id]);
    }

    public function edit(Issue $issue)
    {
        return view('issue.update', compact('issue'));
    }

    public function update(Request $request, Issue $issue)
    {
        $issue->update($request->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000']
        ]));
    }

    public function destroy(Issue $issue)
    {
        //
    }
}
