<?php
//Sandra Pico Álvarez
//Página para ver productos

session_start();
// Verificar si el usuario está loggeado
if (!isset($_SESSION['user'])) {
    // Si no está loggeado, redirigir al login
    header("Location: index.php");
    exit();
}

// Conectar a la base de datos
include('includes/bbdd.php');

//EL CARRITO SE GUARDA AQUÍ
//inicializar variable para el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
//Añadir productos al carrito
if (isset($_POST['id_producto'], $_POST['cantidad'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    //consulta sobre el producto añadido para tener los demás datos
    $sql_carrito = "SELECT * FROM productos WHERE id_producto = ?";
    $stmt = $conn->prepare($sql_carrito);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();
    //si el producto se encuentra en la bbdd
    if ($result->num_rows > 0) {
        //lo guardamos en una variable para poder acceder a sus campos
        $producto = $result->fetch_assoc();
        //stock disponible en bbdd
        $stock = $producto['stock'];
        //buscamos en el carrito y si ese producto está guardamos cuantos hay
        $cant_carrito = 0;
        foreach ($_SESSION['carrito'] as $item) {
            if ($item['id_producto'] == $id_producto) {
                $cant_carrito += $item['cantidad'];
            }
        }

        //si la cantidad supera el stock mostramos error, sino añadimos
        if (($cant_carrito + $cantidad) > $stock) {
            $_SESSION['error'] = "<div class='error'>No puedes añadir al carrito más unidades de las que se disponen en stock</div>";
        } else {
            //recorrer el carrito para ver si el producto esta ya añadido
            $encontrado = false;
            for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                if ($_SESSION['carrito'][$i]['id_producto'] == $id_producto) {
                    $_SESSION['carrito'][$i]['cantidad'] += $cantidad;
                    $encontrado = true;
                }
            }
            //si no estaba en el carrito esto sigue a false
            if (!$encontrado) {
                $producto['cantidad'] = $cantidad;
                $_SESSION['carrito'][] = $producto;
            }
            $_SESSION['exito'] = "<div class='exito'>Producto añadido al carrito correctamente</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .contenedor {
            padding: 0 40px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #6a1b9a;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h2 {
            font-size: 2em;
            color: #6a1b9a;
            margin-bottom: 10px;
            margin-top: 35px;
        }

        p {
            font-size: 1.1em;
            color: #333;
            line-height: 1.6;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 8px;
            font-size: 1.1em;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
        .exito{
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    include('includes/navbar.php');
    ?>
    <div class="contenedor">
        <?php
        //si no se llega enviando el formulario se redirige
        if (isset($_POST['submit'])) {
            if (isset($_POST['id_categoria'])) {
                $id_categoria = $_POST['id_categoria'];

                //Consulta para sacar el nombre y descripción de la categoría
                $sql_nombre = "SELECT * FROM categorias WHERE id_categoria = ?";
                $stmt_nombre = $conn->prepare($sql_nombre);
                $stmt_nombre->bind_param("i", $id_categoria);
                $stmt_nombre->execute();
                $result_categoria = $stmt_nombre->get_result();

                //Realizar la consulta para obtener los productos de la categoría
                $sql = "SELECT * FROM productos WHERE id_categoria = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id_categoria);
                $stmt->execute();
                $result = $stmt->get_result();

                //Mostrar nombre y descripción de la categoría
                if ($result_categoria->num_rows > 0) {
                    $row_categoria = $result_categoria->fetch_assoc();
        ?>
                    <h2><?php echo $row_categoria['nombre']; ?></h2>
                    <p><?php echo $row_categoria['descripcion']; ?></p>
                <?php
                }

                //Mostrar los productos
                if ($result->num_rows > 0) {
                ?>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Unidades</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $cantidad_carrito = 0;
                            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                                foreach ($_SESSION['carrito'] as $item) {
                                    if ($item['id_producto'] == $row['id_producto']) {
                                        $cantidad_carrito = $item['cantidad'];
                                        break;
                                    }
                                }
                            }
                            $stock_temp = $row['stock'] - $cantidad_carrito;
                            $stock_aviso = '';
                            if($stock_temp == 0){
                                $stock_aviso = "<p class='error'>¡No quedan!</p>";
                            }else if($stock_temp == 1){
                                $stock_aviso = "<p class='error'>¡Sólo queda " . $stock_temp . "!</p>";
                            }else if($stock_temp <= 5){
                                $stock_aviso = "<p class='error'>¡Sólo quedan " . $stock_temp . "!</p>";
                            }
                            
                            
                        ?>
                            <tr>
                                <form action="productos.php" method="post">
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['precio'] . "€"; ?></td>
                                    <td>
                                        <?php echo $stock_temp; ?>
                                        <?php echo $stock_aviso; ?>
                                    </td>
                                    <td><input type="number" name="cantidad" value="1" min="1"></td>
                                    <td>
                                        <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                                        <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                                        <input type="submit" value="Añadir" name="submit">
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
        <?php       
                    //si hay mensaje de error o exito lo mostramos y despues lo eliminamos
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['exito'])){
                        echo $_SESSION['exito'];
                        unset($_SESSION['exito']);
                    }
                } else {
                    echo '<p>No hay productos disponibles en esta categoría.</p>';
                }
            }
        } else {
            header("Location: home.php");
            exit();
        }
        ?>
    </div>
</body>

</html>