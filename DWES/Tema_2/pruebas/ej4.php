<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1 = rand(1,5);
    $num2 = rand(1,5);

    if($num1 == $num2){
        echo "Son iguales";
        echo "<br>";
        echo "Número 1: $num1";
        echo "<br>";
        echo "Número 2: $num2";
    }else{
        if($num1 > $num2){
            echo "$num1 es mayor que $num2";
        }else{
            echo "$num2 es mayor que $num1";
        }
    }
    ?>
</body>
</html>