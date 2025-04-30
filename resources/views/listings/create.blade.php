@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create New Listing</h2>

    <form action="{{ route('listings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="skill" class="form-label">Skill</label>
            <select name="skill_id" class="form-control" required>
                <option value="">Select a Skill</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ old('skill_id') == $skill->id ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
            @error('skill_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
            @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="text" name="availability" class="form-control" value="{{ old('availability') }}" required>
            @error('availability')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Listing</button>
    </form>
</div>
@endsection
