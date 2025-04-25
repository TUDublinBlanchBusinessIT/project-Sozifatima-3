@extends('layouts.app')

@section('content')
    <h2>Create New Listing</h2>

    {{-- Show validation errors if there are any --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Show success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('listings.store') }}">
        @csrf

        <div class="mb-3">
            <label for="skill_id" class="form-label">Skill</label>
            <select class="form-control" name="skill_id" id="skill_id" required>
                <option value="" disabled selected>Select a skill</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ old('skill_id') == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="text" class="form-control" name="availability" id="availability" value="{{ old('availability') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Listing</button>
    </form>
@endsection
