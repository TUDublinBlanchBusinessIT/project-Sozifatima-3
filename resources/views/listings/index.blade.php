@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Listings</h2>

        <!-- Search and Create New Listing Button -->
        <div class="d-flex align-items-center">
            <!-- Search input field -->
            <form action="{{ route('listings.index') }}" method="GET">
                <input type="text" name="search" id="search" class="form-control mr-2" placeholder="Search..." value="{{ request()->get('search') }}"/>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <!-- Create New Listing button -->
            <a href="{{ route('listings.create') }}" class="btn btn-success ml-2">+ Create New Listing</a>
        </div>
    </div>

    <!-- Display Listings -->
    @if($listings->isEmpty())
        <div class="alert alert-info">No listings found. Create your first one!</div>
    @else
        <div class="row">
            @foreach($listings as $listing)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $listing->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $listing->skill->name }}</h6>
                            <p class="card-text">{{ Str::limit($listing->description, 100) }}</p>

                            <a href="{{ route('listings.show', $listing->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this listing?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $listings->links() }}
        </div>
    @endif
</div>
@endsection
