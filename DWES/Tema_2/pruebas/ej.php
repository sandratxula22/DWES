<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre = "Sandra";
    $array = array("primero", "segundo", "tercero");
    echo 'Uso de var_dump y print_r'."\n";
    echo '<br>';
    var_dump($nombre);
    echo '<br>';
    print_r($nombre);
    echo '<br>';
    var_dump($array);
    echo '<br>';
    print_r($array);
    echo '<br>';
    echo '<br>';
    echo 'Printear array con for';
    echo '<br>';
    for($i=0;$i<count($array);$i++){
        echo $array[$i];
        echo '<br>';
    }
    echo 'Printear array con implode';
    echo '<br>';
    echo implode(", ", $array);
    ?>
</body>
</html>