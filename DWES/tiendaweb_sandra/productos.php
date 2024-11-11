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
include('bbdd.php');
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

        .navbar {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="contenedor">
        <?php
        if (isset($_GET['id_categoria'])) {
            $id_categoria = $_GET['id_categoria'];

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
                    ?>
                        <tr>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td><input type="number" name="num"></td>
                            <td><input type="submit" value="Comprar" name="submit"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
        <?php
            } else {
                echo '<p>No hay productos disponibles en esta categoría.</p>';
            }
        }
        ?>
    </div>
</body>

</html>