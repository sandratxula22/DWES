<?php
header('Content-Type: application/json');
include("bbdd.php");
session_start();

$sql = "SELECT l.id_libro, l.titulo, l.autor, l.categoria, AVG(puntuacion) as promedio
        FROM libros l
        INNER JOIN resenias r ON l.id_libro = r.id_libro
        GROUP BY l.id_libro, l.titulo, l.autor, l.categoria;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $libros = [];
    while ($row = $result->fetch_assoc()) {
        $libros[] = $row;
    }
    echo json_encode($libros);
} else {
    echo json_encode([]);
}

$conn->close();
?>