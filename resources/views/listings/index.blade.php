<!DOCTYPE html>
<html>
<head>
    <title>All Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Available Listings</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Skill</th>
                <th>Location</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listings as $listing)
                <tr>
                    <td>{{ $listing->title }}</td>
                    <td>{{ $listing->description }}</td>
                    <td>{{ $listing->skill->name ?? 'N/A' }}</td>
                    <td>{{ $listing->location }}</td>
                    <td>{{ $listing->availability }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
