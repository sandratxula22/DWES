<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>TABLAS DE MULTIPLICAR ENTRE DOS NÚMEROS</h1>
    <?php
    function tablas_multiplicar($inicio, $fin){
        $res = "";
        //for para recorrer desde el numero de inicio hasta el de fin
        for($i=$inicio;$i<=$fin;$i++){
            //for para sacar la tabla del número correspondiente
            for($j=0;$j<=10;$j++){
                $res .= "$i * $j = ".$i*$j."<br>";
            }
            $res .= "<br>";
        }

        return $res;
    }

    echo tablas_multiplicar(3, 6);
    ?>
</body>
</html>