<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Language;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show($pseudo)
    {
        $hotel = Hotel::where('pseudo', $pseudo)->firstOrFail();
        $languages = $hotel->languages;

        if ($languages->isEmpty()) {
            $languages = Language::where('included', 1)->get();
        }

        return response()->json([
            'hotel' => $hotel,
            'languages' => $languages,
        ]);
    }
}
