<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>CALCULAR MEDIA</h1>
    <?php
    function calcular_media($array){
        //calculo la suma de los números del array con array_sum()
        $suma = array_sum($array);
        //calculo la media con la suma y el número de elementos del array que se calcula con count()
        $media = $suma/count($array);

        return "Números: ".implode(", ", $array)."<br>La media es: ".$suma."/".count($array)." = ".$media;
    }

    $numeros = [10, 40, 25, 30, 5];
    echo calcular_media($numeros);
    ?>
</body>
</html>