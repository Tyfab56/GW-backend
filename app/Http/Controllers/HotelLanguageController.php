<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Language;
use Illuminate\Http\Request;

class HotelLanguageController extends Controller
{
    public function index($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $languages = Language::all();
        $hotelLanguages = $hotel->languages->pluck('id')->toArray();

        return view('hotels.languages.index', compact('hotel', 'languages', 'hotelLanguages'));
    }

    public function store(Request $request, $hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $hotel->languages()->sync($request->languages);

        return redirect()->route('hotels.languages.index', $hotel)->with('success', 'Languages updated successfully.');
    }
}
