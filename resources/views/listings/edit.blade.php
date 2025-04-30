@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Listing</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('listings.update', $listing->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $listing->title }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skill</label>
                    <select name="skill_id" class="form-select" required>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}" {{ $listing->skill_id == $skill->id ? 'selected' : '' }}>
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $listing->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" value="{{ $listing->location }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Availability</label>
                    <input type="text" name="availability" value="{{ $listing->availability }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('listings.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
