<?php

namespace App\Http\Controllers;

use App\Models\Guests;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guests::orderBy('id', 'asc')->get();

        return view('guests.index', ['guests' => $guests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|max:10'
        ]);

        $guest = Guests::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'phone' => $request->phone,
        ]);

        $guest->save();

        return redirect()->route('welcome')->with('success', 'Thanks for registering!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guests $guests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guests $guests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $guest = Guests::where('id', $request->id);

        $request->validate([
            'is_present' => 'required',
        ]);

        $guest->update([
            'is_present' => $request->is_present,
        ]);

        return redirect()->route('guests.index')->with('success','GUEST UPDATED');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guests $guests)
    {
        //
    }
}
