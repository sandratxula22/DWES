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
    echo "<br>Mayor a menor<br>";
    sort($array);
    echo implode(", ", $array);
    echo "<br>Menor a mayor<br>";
    rsort($array);
    echo implode(", ", $array);
    ?>
</body>
</html>