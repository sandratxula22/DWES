<?php
//página de catálogo de libros
include("bbdd.php");
session_start();
//si no existe la sesión redirige
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}

function mostrarCatalogo($conn){
    ?><h1>Catálogo de Libros</h1><?php
    $sql = "SELECT l.id_libro, l.titulo, l.autor, l.categoria, AVG(puntuacion) as promedio
            FROM libros l
            INNER JOIN resenias r ON l.id_libro = r.id_libro
            GROUP BY l.id_libro, l.titulo, l.autor, l.categoria;";
    $result = $conn->query($sql);
    ?>
    <table border="2">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Puntuación promedio</th>
                <th>Acciones</th>
            </tr>
    <?php
    while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['titulo'] ?></td>
                <td><?php echo $row['autor'] ?></td>
                <td><?php echo $row['categoria'] ?></td>
                <td><?php echo $row['promedio'] ?></td>
                <td>
                    <form action="libro.php" method="post">
                        <input type="hidden" name="id_libro" value="<?php echo $row['id_libro'] ?>">
                        <input type="submit" name="submit" value="Ver Detalles">
                    </form>
                </td>
            </tr>
        <?php
    }
    ?>
    </table>
    <?php
}
function mostrarUltimo(){
    if(isset($_COOKIE['ultimo_visitado'])){
        ?>
        <h1>Último Libro Visitado</h1>
        <ul>
            <li><?php echo $_COOKIE['ultimo_visitado']; ?></li>
        </ul>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
</head>
<body>
    <?php
    include("navbar.php");
    mostrarCatalogo($conn);
    mostrarUltimo();
    ?>
</body>
</html>