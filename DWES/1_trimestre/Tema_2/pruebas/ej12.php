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
    $suma = array_sum($array);
    echo implode(", ", $array);
    echo "<br>";
    echo "Media $suma/".count($array). " = ".$suma/count($array);
    ?>
</body>
</html>