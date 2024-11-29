<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = array(
        "manzana" => "roja",
        "pl&aacute;tano" => "amarillo",
        "naranja" => "naranja"
    );
    echo json_encode($frutas);
    ?>
</body>
</html> 