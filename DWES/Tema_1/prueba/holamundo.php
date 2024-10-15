<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <h1>
        <?php
        echo 'Hola mundo!';
        ?>
    </h1>
    <p>
        <?php
        //variables
        $edad = 23;
        $suma = $edad + 5;
        $altura = 1.60;
        $nom = 'Sandra';
        $bool = true;
        $array = array(
            "azul",
            "rojo",
            "verde"
        );

        //imprimir
        echo 'Mi edad + 5 es = ' .$suma; 
        echo '<br>';
        echo 'Me llamo '.$nom. ' tengo '.$edad. ' años y mi color favorito es el '.$array[0];
        ?>
    </p>
    <p>
        <?php
        $nota_a = 10;
        $nota_b = 5;
        $nota_c = 7;

        $letra = "b";
        $nota = "nota_".$letra;
        echo $$nota; 
        ?>
    </p>
</body>
</html>