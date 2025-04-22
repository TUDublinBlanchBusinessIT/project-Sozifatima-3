<!DOCTYPE html>
<html>
<head>
    <title>SkillSwap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">SkillSwap</h1>

        {{-- Show success message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Main content --}}
        @yield('content')
    </div>
</body>
</html>
