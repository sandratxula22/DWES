<?php
//Sandra Pico Álvarez
//Página para sacar sesión

session_start();
//si se accede sin sesión se redirige a index
if (!isset($_SESSION['user'])) {
    // Si la sesión no está activa, redirigir al login
    header("Location: index.php");
    exit();
}
//destruir variables de sesión
session_unset();
//destruir la sesión
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar sesión</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #87CEEB;
        }
        .contenedor {
            text-align: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .contenedor p {
            font-size: 1.2em;
            color: #333;
        }
        .contenedor a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .contenedor a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <p>Se ha cerrado la sesión correctamente. ¡Hasta la próxima!</p>
        <a href="index.php">Volver a la página de login</a>
    </div>
</body>
</html>