<?php
//Sandra Pico Álvarez
//Página para verificar el login correcto o incorrecto
session_start();
include ('bbdd.php');

//Para solo poder acceder si enviamos el formulario
//Si no el else nos manda al index
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'];
    $password = $_POST['password'];

    //Hacemos la consulta para compararla con lo introducido
}else{
    header("Location: index.php");
}
?>