<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(0,10);

    for($i=0;$i<=10;$i++){
        $res = ($i * $n);
        echo "$n * $i = $res";
        echo "<br>";
    }
    ?>
</body>
</html>