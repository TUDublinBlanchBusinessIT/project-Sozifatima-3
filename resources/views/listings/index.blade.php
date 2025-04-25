@extends('layouts.app')

@section('content')
    <h2>All Listings</h2>

    <a href="{{ route('listings.create') }}" class="btn btn-primary mb-3">Create New Listing</a>

    @if($listings->isEmpty())
        <p>No listings available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Skill</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listings as $listing)
                    <tr>
                        <td>{{ $listing->title }}</td>
                        <td>{{ $listing->skill->name }}</td>
                        <td>{{ $listing->description }}</td>
                        <td>
                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

