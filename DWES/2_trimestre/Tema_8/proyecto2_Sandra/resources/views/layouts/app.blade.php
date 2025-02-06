<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chollos - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <!-- LOGO -->
            <img src="{{ asset('/logo.webp') }}" alt="Chollos Logo" width="40">
        </a>
        <!-- NOMBRE -->
        <a class="navbar-brand" href="/">Chollos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('chollos.nuevos') }}">Nuevos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('chollos.destacados') }}">Destacados</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('chollos.create') }} ">Crear</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <!-- PIE DE PÁGINA -->
    <footer class="text-center mt-4 py-3 bg-light">
        <p>Desarrollado por Sandra - &copy; Chollos {{ date('Y') }}</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>