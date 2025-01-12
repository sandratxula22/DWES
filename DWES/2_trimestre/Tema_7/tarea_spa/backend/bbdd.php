<?php
//crear conexión a la base de datos
$server = "localhost";
$username = "root";
$password = "root";
$database = "resenias_libros";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: ". $conn->connect_error);
}
?>