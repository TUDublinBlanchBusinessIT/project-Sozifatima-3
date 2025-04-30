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

    // Other methods remain the same...
}
