@extends('layouts.app')

@section('content')
    <h2>Create New Listing</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('listings.store') }}">
        @csrf

        <div class="mb-3">
            <label for="skill" class="form-label">Skill</label>
            <select class="form-control" name="skill" id="skill" required> {{-- FIXED --}}
                <option value="" disabled selected>Select a skill</option>
                <option value="Web Development">Web Development</option>
                <option value="Graphic Design">Graphic Design</option>
                <option value="Data Analysis">Data Analysis</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location">
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="text" class="form-control" name="availability" id="availability">
        </div>

        <button type="submit" class="btn btn-primary">Create Listing</button>
    </form>
@endsection
