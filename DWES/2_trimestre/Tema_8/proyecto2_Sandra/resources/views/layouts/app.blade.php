<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto 2 Sandra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Chollos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="/">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Nuevos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Destacados</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('chollos.create') }} ">Crear</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>