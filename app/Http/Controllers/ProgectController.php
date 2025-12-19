<?php

namespace App\Http\Controllers;

use App\Models\Progect;
use Illuminate\Http\Request;

class ProgectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progects = auth()->user()->progects;
        return view('progect.index', compact('progects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('progect.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        Progect::create($data);

        return redirect('/progects');
    }

    /**
     * Display the specified resource.
     */
    public function show(Progect $progect)
    {
        return view('progect.show', compact('progect'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progect $progect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progect $progect)
    {
        $progect->update(['status' => request('status')]);
        return redirect('/progects'. $progect->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progect $progect)
    {
        $progect->delete();
        return redirect('/progects');
    }
}
