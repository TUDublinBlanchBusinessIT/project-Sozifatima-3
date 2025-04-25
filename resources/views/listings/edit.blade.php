@extends('layouts.app')

@section('content')
    <h2>Edit Listing</h2>

    <form method="POST" action="{{ route('listings.update', $listing->id) }}">
        @csrf
        @method('PUT') <!-- This is for the PUT method for updating -->

        <div class="mb-3">
            <label for="skill_id" class="form-label">Skill</label>
            <select class="form-control" name="skill_id" id="skill_id" required>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ $skill->id == $listing->skill_id ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $listing->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description">{{ old('description', $listing->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" value="{{ old('location', $listing->location) }}">
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="text" class="form-control" name="availability" id="availability" value="{{ old('availability', $listing->availability) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Listing</button>
    </form>
@endsection
