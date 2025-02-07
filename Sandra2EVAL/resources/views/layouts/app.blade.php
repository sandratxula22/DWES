<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal de empleo</title>
</head>
<body>
    <h1>PORTAL DE EMPLEO</h1>
    <nav>
        <ul>
            <li><a href=" {{ route('ofertas.index')}} ">Inicio</a></li>
            <li><a href=" {{ route('ofertas.crear')}} ">Crear Oferta</a></li>
        </ul>
    </nav>

    @yield('content')

    <footer>
        <p style="text-align: center">Sandra Pico Álvarez - &#169 Portal de Empleo {{ date('Y') }}</p>
    </footer>
</body>
</html>