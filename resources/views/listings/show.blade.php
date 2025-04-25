@extends('layouts.app')

@section('content')
    <h2>{{ $listing->title }}</h2>

    <p><strong>Skill:</strong> {{ $listing->skill->name }}</p>
    <p><strong>Description:</strong> {{ $listing->description }}</p>
    <p><strong>Location:</strong> {{ $listing->location }}</p>
    <p><strong>Availability:</strong> {{ $listing->availability }}</p>

    <a href="{{ route('listings.index') }}" class="btn btn-secondary mt-3">Back to Listings</a>
@endsection
