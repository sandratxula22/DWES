<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dia = rand(1,7);

    switch($dia){
        case 1:
            echo "$dia. Lunes";
            break;
        case 2:
            echo "$dia. Martes";
            break;
        case 3:
            echo "$dia. Miércoles";
            break;
        case 4:
            echo "$dia. Jueves";
            break;
        case 5:
            echo "$dia. Viernes";
            break;
        case 6:
            echo "$dia. Sábado";
            break;
        case 7:
            echo "$dia. Domingo";
            break;
        default:
            echo "error";
    }
    ?>
</body>
</html>