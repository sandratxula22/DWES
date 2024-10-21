<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
    function anagrama($text1, $text2){
        $text1 = strtolower(str_replace(" ", "", $text1));
        $text2 = strtolower(str_replace(" ", "", $text2));

        $array1 = str_split($text1);
        $array2 = str_split($text2);

        sort($array1);
        sort($array2);


        var_dump($array1);
        var_dump($array2);

        if($array1 === $array2){
            return $text1." y ".$text2." son anagramas.";
        }else{
            return $text1." y ".$text2." NO son anagramas.";
        }
    }

    echo anagrama("hola", "alohh");
    ?>
</body>
</html>