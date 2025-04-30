<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Make sure to import User model if needed

class ProfileController extends Controller
{
    public function show()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Return the profile view and pass the user object
        return view('profile', ['user' => $user]);
    }
}
