<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Admin - Desa Negarajati</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-light min-vh-100">

    <main class="form-signin w-100 m-auto" style="max-width: 400px; padding: 15px;">
        <div class="card border-0 shadow-sm p-4 rounded-3">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h3 class="fw-bold text-success m-0">Desa Negarajati</h3>
                </a>
                <small class="text-muted">Panel Akses Administrator</small>
            </div>

            <!-- Tempat Form Login / Register Dimuat -->
            {{ $slot }}

        </div>

        <p class="mt-4 mb-3 text-muted text-center small">&copy; 2026 Desa Negarajati</p>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>