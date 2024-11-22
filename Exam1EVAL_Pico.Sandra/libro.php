<?php
//página del libro elegido
include("bbdd.php");
session_start();
//si no existe la sesión redirige
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}
//si no se llega por post se redirige
if($_SERVER["REQUEST_METHOD"] !== 'POST'){
    header('Location: home.php');
    exit();
}



//función que muestra la primera parte con los detalles del libro
function mostrarDetalles($conn){
    $id_libro = $_POST['id_libro'];
    $sql = "SELECT * FROM libros WHERE id_libro = ?";;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_libro);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            //creamos la cookie del libro visitado
            setcookie("ultimo_visitado", $row['titulo'], time() + 3600, "/");
            ?>
            <h1>Detalles del Libro: <?php echo $row['titulo']; ?></h1>
            <p><b>Autor:</b> <?php echo $row['autor']; ?></p>
            <p><b>Categoría:</b> <?php echo $row['categoria']; ?></p>
            <?php
        }
    }
}

//función que muestra la parte de reseñas
function mostrarResenias($conn){
    $id_libro = $_POST['id_libro'];

    $sql_resenias = "SELECT r.id_resena, r.id_libro, u.email, r.puntuacion, r.comentario
                        FROM resenias r
                        INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
                        WHERE id_libro = ?";
    $stmt_resenias = $conn->prepare($sql_resenias);
    $stmt_resenias->bind_param("i", $id_libro);
    $stmt_resenias->execute();
    $result = $stmt_resenias->get_result();


    if($result->num_rows > 0){
        ?>
        <h2>Reseñas</h2>
        <ul>
        <?php
        while($row = $result->fetch_assoc()){
            ?>
            <li><?php echo $row['email'] . ": ". $row['puntuacion']."/5" . " - " . $row['comentario'] ; ?></li>
            <?php
        }
        ?>
        </ul>
        <?php
    }

    ?>
    <h3>Tu Reseña</h3>
    <form action="" method="post">
        <label>Puntuación: </label>
        <select name="nota">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <label>Comentario:</label>
        <textarea name="texto"></textarea><br>
        
        <input type="hidden" name="id_libro" value="<?php echo $id_libro; ?>">
        <input type="submit" name="submit2" value="Guardar Reseña">
    </form>

    <p><a href="home.php">Volver al catálogo</a></p>
    <?php
}

function actualizarResenia($conn){
    if(isset($_POST['submit2'])){
        $cometario = $_POST['texto'];
        $puntuacion = $_POST['nota'];
        $id_libro = $_POST['id_libro'];
        $id_usuario = $_SESSION['id_usuario'];
        $fecha = date("Y-m-d");

        $sql_check = "SELECT * FROM resenias WHERE id_usuario = ? AND id_libro = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ii", $id_usuario, $id_libro);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();


        //comprobamos si ya hay un comentario creado, sino lo creamos
        if($result_check->num_rows > 0){
            $sql_update = "UPDATE resenias
                        SET comentario = ?, puntuacion = ?, fecha = ?
                        WHERE id_usuario = ? AND id_libro = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sisii", $cometario, $puntuacion, $fecha, $id_usuario, $id_libro);
        
            if($stmt_update->execute()){
                echo "<p style='color: green'>Reseña modificada con éxito</p>";
            }
        }else{
            $sql_insert = "INSERT INTO resenias(id_usuario, id_libro, puntuacion, comentario, fecha) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("iiiss", $id_usuario, $id_libro, $puntuacion, $cometario, $fecha);
            if($stmt_insert->execute()){
                echo "<p style='color: green'>Reseña añadida con éxito</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libro</title>
</head>
<body>
    <?php
    include("navbar.php");
    //se actualiza primero y así cuando muestra el contenido lo muestra actualizado
    actualizarResenia($conn);
    mostrarDetalles($conn);
    mostrarResenias($conn);
    ?>
</body>
</html>