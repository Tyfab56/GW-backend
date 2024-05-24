<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the hotels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created hotel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:hotels',
            'pseudo' => 'required|string|max:255|unique:hotels',
            'password' => 'required|string|min:8|confirmed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;

        $hotel = new Hotel([
            'title' => $request->title,
            'logo' => $path,
            'address' => $request->address,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'website' => $request->website,
            'pseudo' => $request->pseudo,
            'password' => bcrypt($request->password),
        ]);

        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Show the form for editing the specified hotel.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:hotels,email,' . $hotel->id,
            'pseudo' => 'required|string|max:255|unique:hotels,pseudo,' . $hotel->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Supprimer l'ancien logo s'il existe
            if ($hotel->logo) {
                Storage::delete('public/' . $hotel->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
        } else {
            $path = $hotel->logo;
        }

        $hotel->update([
            'title' => $request->title,
            'logo' => $path,
            'address' => $request->address,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'website' => $request->website,
            'pseudo' => $request->pseudo,
            'password' => $request->password ? bcrypt($request->password) : $hotel->password,
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        if ($hotel->logo) {
            Storage::delete('public/' . $hotel->logo);
        }

        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
