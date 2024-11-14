<?php
//Sandra Pico Álvarez
//Página para el carrito

session_start();
// Verificar si el usuario está loggeado
if (!isset($_SESSION['user'])) {
    // Si no está loggeado, redirigir al login
    header("Location: index.php");
    exit();
}

// Conectar a la base de datos
include('bbdd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #6a1b9a;
            font-weight: bold;
            text-align: center;
            margin-top: 30px;
            font-size: 2em;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th,
        table td {
            padding: 12px 20px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #6a1b9a;
            color: white;
            font-size: 1.1em;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table td input[type="submit"] {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        table td input[type="submit"]:hover {
            background-color: #d32f2f;
        }

        table td input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        table td input[type="number"]:focus {
            border-color: #6a1b9a;
        }

        form {
            margin: 0;
        }

        p {
            font-size: 1.1em;
            color: #333;
            line-height: 1.6;
            text-align: center;
        }

        .total {
            font-size: 1.5em;
            font-weight: bold;
            color: #6a1b9a;
            margin-top: 20px;
            text-align: center;
        }

        form input[type="submit"] {
            background-color: #28a745;
            /* Verde */
            color: white;
            /* Texto blanco */
            border: none;
            /* Sin borde */
            padding: 12px 24px;
            /* Relleno del botón */
            font-size: 1.2em;
            /* Tamaño de la fuente del botón */
            border-radius: 8px;
            /* Bordes redondeados */
            cursor: pointer;
            /* Cambiar el cursor a mano */
            transition: background-color 0.3s ease;
            /* Efecto al pasar el ratón */
            display: block;
            /* Asegura que el botón ocupe el ancho completo */
            margin: 20px auto;
            /* Centrar el botón en la página */
        }

        form input[type="submit"]:hover {
            background-color: #218838;
            /* Cambiar a verde más oscuro al pasar el ratón */
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <h2>Carrito</h2>
    <?php
    if (!empty($_SESSION['carrito'])) {
        $total = 0;
    ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio ud</th>
                <th>Unidades</th>
                <th>Precio total</th>
            </tr>
            <?php
            foreach ($_SESSION['carrito'] as $item) {
                $producto_total = $item['precio'] * $item['cantidad'];
                $total += $producto_total;
            ?>
                <form>
                    <tr>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['descripcion']; ?></td>
                        <td><?php echo $item['precio']."€"; ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td><?php echo $producto_total."€"; ?></td>
                        <td>
                            <input type="submit" name="submit" value="Eliminar">
                        </td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>
        <div class="total"><?php echo "Total: " . $total . "€"; ?></div>
        <form action="realizar_pedido.php" method="post">
            <input type="submit" value="Hacer pedido">
        </form>
    <?php
    } else {
    ?>
        <h3>El carrito está vacío</h3>
    <?php
    }
    ?>
</body>

</html>