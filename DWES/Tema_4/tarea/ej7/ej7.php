<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
    function quitarTildes($cadena) {
        $buscar = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'];
        $reemplazar = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        return str_replace($buscar, $reemplazar, $cadena);
    }

    function anagrama($text1, $text2){
        //mb_strtolower convierte a minúsculas teniendo en cuenta caracteres especiales
        //quitarTildes es mi función creada para que elimine las tildes y solo tenga en cuenta la letra
        //str_replace para eliminar los espacios en blanco
        $text1_simp = mb_strtolower(quitarTildes(str_replace(" ", "", $text1)));
        $text2_simp = mb_strtolower(quitarTildes(str_replace(" ", "", $text2)));

        //separamos el texto en un array de letras
        $array1 = str_split($text1_simp);
        $array2 = str_split($text2_simp);

        //los ordeno
        sort($array1);
        sort($array2);

        //están ordenados así que si son anagramas serán el mismo array
        if($array1 === $array2){
            return $text1." y ".$text2." son anagramas.";
        }else{
            return $text1." y ".$text2." NO son anagramas.";
        }
    }

    echo anagrama("Ñu", "uñ");
    echo "<br>";
    echo anagrama("Esponja", "Japonés");
    echo "<br>";
    echo anagrama("Ósea", "Aseo");
    ?>
</body>
</html>