<?php
$name = "Sandra";
if(isset($_COOKIE[$name])){
    $valor = $_COOKIE[$name] + 1;
}else{
    $valor = 1;
}

setcookie($name, $valor, time() + (24*60*60));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Visitas</title>
</head>
<body>
    <?php
    echo "Visita número ".$valor;
    ?>
</body>
</html>