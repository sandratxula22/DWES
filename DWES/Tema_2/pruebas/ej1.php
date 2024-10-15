<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $i = rand(1,100);
    if($i % 2 == 0){
        echo "el número es par: $i";
    }else{
        echo "el número es impar: $i";
    }
    ?>
</body>
</html>