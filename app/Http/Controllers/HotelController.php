<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

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
        ]);

        $hotel = new Hotel([
            'title' => $request->title,
            'logo' => $request->logo,
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
}
