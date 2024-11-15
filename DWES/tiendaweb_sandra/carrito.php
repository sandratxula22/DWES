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
include('includes/bbdd.php');
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
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 1.2em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php
    include('includes/navbar.php');
    
    //si se pulsa el botón eliminar borramos la línea
    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $cant_borrar = $_POST['cantidad_borrar'];
        foreach ($_SESSION['carrito'] as $index => $item) {
            if($nombre === $item['nombre']){
                //si la cantidad a borrar es menor o igual lo borra
                if($cant_borrar <= $item['cantidad']){
                    $_SESSION['carrito'][$index]['cantidad'] -= $cant_borrar;
                    //si la cantidad es 0 borramos la línea
                    if($_SESSION['carrito'][$index]['cantidad'] == 0){
                        unset($_SESSION['carrito'][$index]);
                        //reindexar los elementos del carrito ya que no se hace automático
                        //y si tenemos 0, 1, 2 y borramos el index 1, nos quedariamos con 0, 2
                        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                    }
                }
            }
        }
    }
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
                <th>Precio total</th>
                <th>Unidades</th>
            </tr>
            <?php
            foreach ($_SESSION['carrito'] as $item) {
                $producto_total = $item['precio'] * $item['cantidad'];
                $total += $producto_total;
            ?>
                <form action="carrito.php" method="post">
                    <tr>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['descripcion']; ?></td>
                        <td><?php echo $item['precio']."€"; ?></td>
                        <td><?php echo $producto_total."€"; ?></td>
                        <td>
                            <input type="number" name="cantidad_borrar" min="1" max="<?php echo $item['cantidad'];?>" value="<?php echo $item['cantidad'];?>">
                        </td>
                        <td>
                            <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                            <input type="submit" name="submit" value="Eliminar">
                        </td>
                    </tr>
                </form>
            <?php
            }
            $_SESSION['total'] = $total;
            ?>
        </table>
        <div class="total"><?php echo "Total: " . $total . "€"; ?></div>
        <form action="realizar_pedido.php" method="post">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="submit" name="submit" value="Hacer pedido">
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