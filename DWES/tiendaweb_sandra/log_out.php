<?php
//Sandra Pico Álvarez
//Página para sacar sesión

session_start();
//destruir variables de sesión
session_unset();
//destruir la sesión
session_destroy();
//redirigir a index
header("Location: index.php");
?>