<?php
//variables de la bbdd
$servername = "localhost";
$username = "root";
$password = "";
$database = "tienda_restaurantes";

//crear conexión
$conn = new mysqli($servername, $username, $password, $database);
//verificar la conexión
if($conn->connect_error){
    die("Conexión a la base de datos fallida: ".$conn->$connect_error);
}
?>