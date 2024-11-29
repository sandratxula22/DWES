<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $array= array();
    for($i=0;$i<10;$i++){
        $array[$i] = rand(1,30);
    }
    echo implode(", ", $array);
    $mayor = $array[0];
    $menor = $array[0];
    for($i=1;$i<count($array);$i++){
        if($array[$i] > $mayor){
            $mayor = $array[$i];
        }
        if($array[$i] < $menor){
            $menor = $array[$i];
        }
    }
    echo "<br>";
    echo "El mayor es: $mayor";
    echo "<br>";
    echo "El menor es: $menor";
    ?>
</body>
</html>