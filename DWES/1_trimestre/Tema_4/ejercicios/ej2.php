<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function sumar($a, $b, $c, $d, $e){
        return "$a + $b + $c + $d + $e = " .$a+$b+$c+$d+$e;
    }

    echo sumar(1,2,3,4,5);
    ?>
</body>
</html>