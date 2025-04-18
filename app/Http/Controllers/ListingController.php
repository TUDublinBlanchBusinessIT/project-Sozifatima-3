<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Skill;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::with('skill')->get();
        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return view('listings.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
        ]);

        Listing::create($request->all());

        return redirect('/listings')->with('success', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listing = Listing::with('skill')->findOrFail($id);
        return view('listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        $skills = Skill::all();
        return view('listings.edit', compact('listing', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
        ]);

        $listing = Listing::findOrFail($id);
        $listing->update($request->all());

        return redirect('/listings')->with('success', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return redirect('/listings')->with('success', 'Listing deleted successfully!');
    }
}
