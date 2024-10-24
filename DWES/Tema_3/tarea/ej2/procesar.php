<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas</title>
    <style>
        table{
            border: 2px solid black;
            border-collapse: collapse;
        }

        td{
            border: 2px solid black;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST["num"]) && !empty($_POST["num"])){
        $num = $_POST["num"];

        //para admitir números entre 1 y 20
        if($num >= 1 && $num <=20){
            //tablas
            for($k=1;$k<=$num;$k++){
                //cada tabla se aumenta el rojo
                $rojo = $k * (255/$num);
                ?>
                <h2>Tabla número <?php echo $k; ?></h2>
                <table>
                    <?php
                    //filas
                    for($i=1;$i<=$num;$i++){
                        //cada fila se aumenta el verde
                        $verde = $i * (255/$num);
                        ?>
                        <tr>
                            <?php
                            //columnas
                            for($j=1;$j<=$num;$j++){
                                //cada columna se aumenta el azul
                                $azul = $j * (255/$num);
                                ?>
                                <td style="background-color: rgb(<?php echo $rojo.",".$verde.",".$azul; ?>)"></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <br>
                <?php
            }
        }else{
            echo "Introduce un número entre 1 y 20<br>";
            echo "<a href='ej2.php'>Vuelve a intentarlo</a>";
        }
    }else{
        echo "Introduce un número válido<br>";
        echo "<a href='ej2.php'>Vuelve a intentarlo</a>";
    }
    ?>
</body>
</html>