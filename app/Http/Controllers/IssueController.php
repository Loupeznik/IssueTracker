<?php

namespace App\Http\Controllers;

use App\Issue;
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
        return view('issue.create');
    }

    public function store(Request $request)
    {
        Issue::create($request->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000'],
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
            'Desc' => ['required', 'min:30', 'max:1000'],
        ]));
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect('/issues');
    }

    public function list() {

    }

    public function validateInput($request) {

        return $request->validate([
            'Name' => ['required', 'min:10', 'max:100'],
            'Desc' => ['required', 'min:30', 'max:1000'] //doplnit
        ]);

    }
}
