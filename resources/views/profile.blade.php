@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Welcome, {{ auth()->user()->name }}!</h5>
                <p class="card-text">Email: {{ auth()->user()->email }}</p>
                <p class="card-text">Member since: {{ auth()->user()->created_at->format('F d, Y') }}</p>

                <!-- Profile Picture / Edit link can go here -->

                <!-- List of User Listings -->
                <p class="card-text">Your Listings:</p>
                
                @forelse($user->listings as $listing)
                    <ul>
                        <li>{{ $listing->title }} - {{ $listing->skill->name }}</li>
                    </ul>
                @empty
                    <p>No listings available.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
