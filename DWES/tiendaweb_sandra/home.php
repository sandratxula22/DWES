<?php
//Sandra Pico Álvarez
//Página home con categorías

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
    <title>Categorías</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .categorias-container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .categoria-card {
            width: 30%;
            margin: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .categoria-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .categoria-card h3 {
            margin-top: 10px;
        }
        .categoria-card p {
            font-size: 0.9rem;
            color: #555;
        }
        .categoria-card a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .categoria-card a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    include('navbar.php');

    //consulta para categorías
    $sql = "SELECT * FROM categorias";
    $result = $conn->query($sql);
    ?>

    <div class="categorias-container">
        <?php
        // Comprobar si hay categorías en la base de datos
        if ($result->num_rows > 0) {
            // Mostrar todas las categorías
            while($row = $result->fetch_assoc()) {
                $id_categoria = $row['id_categoria'];
                ?>
                    <div class="categoria-card">
                        <h3> <?php echo $row['nombre']; ?></h3>
                        <p> <?php echo $row['descripcion']; ?></p>
                        <a href="productos.php?id_categoria=<?php echo $id_categoria;?>">Ver productos</a>
                    </div>
                <?php
            }
        } else {
            echo '<p>No hay categorías disponibles en este momento.</p>';
        }
        ?>
    </div>
</body>
</html>