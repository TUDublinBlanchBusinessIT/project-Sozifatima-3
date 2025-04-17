<!DOCTYPE html>
<html>
<head>
    <title>Skills List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Available Skills</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/skills/create" class="btn btn-primary mb-3">Add New Skill</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->description }}</td>
                    <td>
                        <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this skill?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>


