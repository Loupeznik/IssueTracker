<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priority;

class PriorityController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::withCount('issue')->get();

        return view('admin.priorities.list', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.priorities.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Priority::create($request->validate([
            'Name' => 'required|min:3|max:15',
        ]));

        return $this->redirectToList();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Priority::destroy($id); //doesn't destroy linked issues with it -> TO FIX

        return $this->redirectToList();
    }

    private function redirectToList()
    {
        return redirect('/admin/category/priority/');
    }
}
