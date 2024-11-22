<?php
//cerrar sesión
include("bbdd.php");
session_start();
//si no existe la sesión redirige
if(!isset($_SESSION["user"])){
    header("Location: index.php");
    exit();
}

//destruimos la sesión
session_unset();
session_destroy();
//borrar la cookie
setcookie("ultimo_visitado", "", time()-3600,"/");
header("Location: index.php");
exit();
?>