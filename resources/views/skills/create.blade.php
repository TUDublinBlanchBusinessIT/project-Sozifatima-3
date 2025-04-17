<!DOCTYPE html>
<html>
<head>
    <title>Add New Skill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Add a New Skill</h1>
    <form method="POST" action="{{ route('skills.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Skill Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Skill</button>
    </form>
</div>
</body>
</html>
