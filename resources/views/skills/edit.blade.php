<!DOCTYPE html>
<html>
<head>
    <title>Edit Skill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Skill</h1>
    <form method="POST" action="{{ route('skills.update', $skill->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $skill->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Skill Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $skill->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Skill</button>
        <a href="/skills" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
