<?php
//Sandra Pico Álvarez
//conexión a la bbdd para incluir en las páginas

//variables de la bbdd
$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda_restaurantes";

//crear conexión
$conn = new mysqli($servername, $username, $password, $database);
//verificar la conexión
if($conn->connect_error){
    die("Conexión a la base de datos fallida");
}
?>