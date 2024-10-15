<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medallas</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }
        th, tr {
            padding: 25px;
            
        }
        th{
            background-color: grey;
        }
    </style>
</head>

<body>
    <h1>Medallas en los Juegos Olímpicos por París</h1>
    <table>
        <tr>
            <th>País</th>
            <th>Oro</th>
            <th>Plata</th>
            <th>Bronce</th>
        </tr>
        <?php
        $medallas = array("Estados Unidos" => array(39, 41, 33), "China" => array(38, 32, 18), "Rusia" => array(20, 28, 23), "Japón" => array(27, 14, 17), "Australia" => array(17, 7, 22));

        foreach ($medallas as $key => $val) {
        ?>
            <tr>
                <td><?php echo $key; ?> </td>
                <?php
                for ($i = 0; $i < count($val); $i++) {
                    if ($i == 0) {
                ?>
                        <td style="background-color: gold"><?php echo $val[$i]; ?></td>
                    <?php
                    } else if ($i == 1) {
                    ?>
                        <td style="background-color: silver"><?php echo $val[$i]; ?></td>
                    <?php
                    } else {
                    ?>
                        <td style="background-color: rgb(205, 127, 50)"><?php echo $val[$i]; ?></td>
            <?php
                    }
                }
            }
            ?>
            </tr>
    </table>
</body>

</html>