<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nota = rand(1,10);

    if($nota>= 1 && $nota < 5){
        echo "Suspenso: $nota";
    }else if($nota >= 5 && $nota<=6){
        echo "Aprobado: $nota";
    }else if($nota >= 7 && $nota<=8){
        echo "Notable: $nota";
    }else{
        echo "Sobresaliente: $nota";
    }
    ?>
</body>
</html>