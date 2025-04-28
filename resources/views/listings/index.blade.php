@extends('layouts.app')

@section('content')
    <h2>All Listings</h2>

    <a href="{{ route('listings.create') }}" class="btn btn-primary mb-3">Create New Listing</a>

    {{-- Search form --}}
    <form method="GET" action="{{ route('listings.index') }}" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search listings..." value="{{ request()->query('search') }}">
    </form>

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
                        <td>{{ $listing->skill }}</td> {{-- Display the skill --}}
                        <td>{{ $listing->description }}</td>
                        <td>
                            <a href="{{ route('listings.edit', $listing->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Delete form with confirmation -->
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $listing->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $listing->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination links --}}
        <div class="d-flex justify-content-center">
            {{ $listings->links() }}
        </div>
    @endif
@endsection

@section('scripts')
    {{-- Include SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Success popup --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    {{-- Error popup --}}
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif

    {{-- Delete Confirmation Script --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form if confirmed
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
