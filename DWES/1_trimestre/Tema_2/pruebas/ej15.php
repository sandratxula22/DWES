<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = array(
        "manzana" => "roja",
        "plátano" => "amarillo",
        "naranja" => "naranja"
    );
    echo "Ascendente por valor<br>";
    asort($frutas);
    foreach($frutas as $clave => $valor){
        echo "$clave = $valor <br>";
    }
    echo "<br>Ascendente por clave<br>";
    ksort($frutas);
    foreach($frutas as $clave => $valor){
        echo "$clave = $valor <br>";
    }
    echo "<br>Descendente por valor<br>";
    arsort($frutas);
    foreach($frutas as $clave => $valor){
        echo "$clave = $valor <br>";
    }
    echo "<br>Descendente por clave<br>";
    krsort($frutas);
    foreach($frutas as $clave => $valor){
        echo "$clave = $valor <br>";
    }
    ?>
</body>
</html>