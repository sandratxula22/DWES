<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperaturas</title>
    <style>
        table{
            border-collapse: collapse;
            
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th{
            background-color: rgb(102,178,255);
            color: white;
        }
    </style>
</head>
<body>
    <?php
    $ciudades = array("Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia","Valladolid", "Zamora");
    $temp = array();
    foreach($ciudades as $c){
        $temp[$c] = rand(-10,40);
    }
    ?>
    <table>
        <tr>
            <th>Provincia</th>
            <th>Temperatura (ºC)</th>
        </tr>
        <?php
        foreach($temp as $ciudad => $grados){
            ?>
            <tr>
                <td><?php echo $ciudad; ?></td>
                <?php
                    if($grados >= -10 & $grados <= 0){
                        echo '<td style="background-color: rgb(51,153,255)">'.$grados.'</td>';
                    }else if($grados > 0 && $grados <=20 ){
                        echo '<td>'.$grados.'</td>';
                    }else if($grados > 20){
                        echo '<td style="background-color: rgb(255,51,51)">'.$grados.'</td>';
                    }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>