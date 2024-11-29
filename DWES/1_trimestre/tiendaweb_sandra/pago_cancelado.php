<?php
//Sandra Pico Álvarez
//Página de error para pago de paypal cancelado

session_start();
// Verificar si el usuario está loggeado
if (!isset($_SESSION['user'])) {
    // Si no está loggeado, redirigir al login
    header("Location: index.php");
    exit();
}

// Conectar a la base de datos
include('includes/bbdd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago cancelado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <div class="error">El pago se ha cancelado.</div>
    <?php
    include('includes/footer.php')
    ?>
</body>

</html>