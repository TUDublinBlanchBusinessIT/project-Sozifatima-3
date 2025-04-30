@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $listing->title }}</h2>
            <h6 class="card-subtitle mb-3 text-muted">{{ $listing->skill->name }}</h6>

            <p class="card-text">
                <strong>Description:</strong><br>
                {{ $listing->description }}
            </p>

            <p class="card-text">
                <strong>Location:</strong> {{ $listing->location }}
            </p>

            <p class="card-text">
                <strong>Availability:</strong> {{ $listing->availability }}
            </p>

            <a href="{{ route('listings.index') }}" class="btn btn-secondary mt-3">Back to Listings</a>
        </div>
    </div>
</div>
@endsection
