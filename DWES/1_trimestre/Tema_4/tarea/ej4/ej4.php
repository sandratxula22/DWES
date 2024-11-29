<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <style>
        h3{
            color: purple;
        }
    </style>
</head>
<body>
    <h1>PROBANDO INCLUDE</h1>
    <?php
    //incluimos el archivo de funciones
    include ('funciones.php');

    //probamos las funciones que hemos incluido
    echo "<h3>CALCULAR MEDIA</h3>";
    $numeros = [33, 56, 10, 22, 1, 100];
    echo calcular_media($numeros);

    echo "<h3>IMPRIMIR ARRAY</h3>";
    $tabla = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
    echo imprimir_array($tabla);

    echo "<h3>TABLAS DE MULTIPLICAR ENTRE DOS NÚMEROS</h3>";
    echo tablas_multiplicar(2, 5);
    ?>
</body>
</html>