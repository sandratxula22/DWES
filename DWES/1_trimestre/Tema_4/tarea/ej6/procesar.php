<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - procesar</title>
</head>

<body>
    <?php
    //Para que no se pueda acceder sin enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num = $_POST["num"];

        echo "<h2>Números primos entre 1 y $num</h2>";
        //recorro desde 1 hasta mi número
        for ($i=1;$i<=$num;$i++) {
            $esPrimo = true;
            //voy desde 2 hasta el número anterior a mi número, si es divisible entre alguno, ya no es primo
            for($j=2;$j<$i;$j++){
                if($i % $j == 0){
                    $esPrimo = false;
                }
            }
            if($esPrimo){
                echo $i."<br>";
            }
        }
        echo "<br>";
    }
    ?>
    <form action="ej6.php">
        <button type="submit">Inserta otro número</button>
    </form>
</body>

</html>