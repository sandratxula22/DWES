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

    switch($nota){
        case 1:
        case 2:
        case 3:
        case 4:
            echo "Suspenso: $nota";
            break;
        case 5:
        case 6:
            echo "Aprobado: $nota";
            break;
        case 7:
        case 8:
            echo "Notable: $nota";
            break;
        case 9:
        case 10:
            echo "Sobresaliente: $nota";
            break;
        default:
            echo "error";
    }
    ?>
</body>
</html>