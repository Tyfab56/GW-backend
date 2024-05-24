<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class LanguageController extends Controller
{
    /**
     * Display a listing of the languages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created language in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'included' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('languages', 'public') : null;

        $language = new Language([
            'name' => $request->name,
            'included' => $request->included,
            'image' => $path,
        ]);

        $language->save();

        return redirect()->route('languages.index')->with('success', 'Language created successfully.');
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified language in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'included' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            // Supprimer l'ancien image s'il existe
            if ($language->image) {
                Storage::delete('public/' . $language->image);
            }
            $path = $request->file('image')->store('languages', 'public');
        } else {
            $path = $language->image;
        }
        $included = (int) $request->included;

        $language->update([
            'name' => $request->name,
            'included' => $included,
            'image' => $path,
        ]);




        return redirect()->route('languages.index')->with('success', 'Language updated successfully.');
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if ($language->image) {
            Storage::delete('public/' . $language->image);
        }

        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Language deleted successfully.');
    }
}
