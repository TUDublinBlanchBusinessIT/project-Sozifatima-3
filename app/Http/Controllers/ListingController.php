<?php

namespace App\Http\Controllers;

use App\Models\Listing;  // Make sure you import the model
use App\Models\Skill;    // Import the Skill model for validation (if needed)
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Display all listings with pagination and search functionality
    public function index(Request $request)
    {
        // Get search keyword
        $search = $request->input('search');

        // Paginate listings (10 per page), filter by title or skill if search is provided
        $listings = Listing::when($search, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhereHas('skill', function ($query) use ($search) {
                             $query->where('name', 'like', '%' . $search . '%');
                         });
        })->paginate(10);

        return view('listings.index', compact('listings', 'search'));  // Pass the listings and search keyword to the view
    }

    // Show a specific listing
    public function show($id)
    {
        $listing = Listing::findOrFail($id);  // Find a listing by its ID or fail
        return view('listings.show', compact('listing'));  // Pass the listing to the view
    }

    // Show form for creating a new listing
    public function create()
    {
        // Pass skills data to the create view to allow user to select a skill
        $skills = Skill::all();  // Get all skills for the dropdown list
        return view('listings.create', compact('skills'));  // Pass skills to the view
    }

    // Store a new listing in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'skill_id' => 'required|exists:skills,id',  // Ensure the skill exists in the skills table
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
        ]);

        Listing::create($validatedData);  // Create the listing

        return redirect()->route('listings.index');  // Redirect to the listings index page
    }

    // Show form for editing an existing listing
    public function edit($id)
    {
        $listing = Listing::findOrFail($id);  // Find the listing by its ID
        $skills = Skill::all();  // Get all skills for the dropdown list
        return view('listings.edit', compact('listing', 'skills'));  // Pass the listing and skills to the edit view
    }

    // Update an existing listing in the database
    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);  // Find the listing by its ID

        $validatedData = $request->validate([
            'skill_id' => 'required|exists:skills,id',  // Ensure the skill exists in the skills table
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
        ]);

        $listing->update($validatedData);  // Update the listing with the validated data

        return redirect()->route('listings.index');  // Redirect to the listings index page
    }

    // Delete a listing from the database
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);  // Find the listing by its ID
        $listing->delete();  // Delete the listing

        return redirect()->route('listings.index');  // Redirect to the listings index page
    }
}
