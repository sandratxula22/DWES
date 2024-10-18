<?php
//variables de bbdd
$servername = "localhost";
$username = "root";
$password = "";
$database = "cursos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    echo "Conexión establecida<br>";
}
echo $conn->host_info. "<br>";
?>
