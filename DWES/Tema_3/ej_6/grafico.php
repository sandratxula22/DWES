<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            margin: 10px;
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Gráfico de crecimiento de ingresos:</h1>
    <?php
    if(!empty($_POST["ing_ant"]) && !empty($_POST["ing_act"])){
        $deptos = ["Ventas", "Desarrollo", "Operaciones", "Calidad", "Atención al cliente"];
        $ing_ant = $_POST["ing_ant"];
        $ing_act = $_POST["ing_act"];
        echo "Ingresos anteriores: " . implode(", ", $ing_ant) . "<br>";
        echo "Ingresos actuales: " . implode(", ", $ing_act);
        ?>
        <?php
        for($i=0;$i<count($deptos);$i++){
            $width = (($ing_act[$i]-$ing_ant[$i])/$ing_ant[$i])*100;
            ?>
                <div style="background-color: red; width:<?php echo $width; ?>%"><?php echo $deptos[$i].": ".$width."%"; ?></div>
            <?php
        }
        ?>
        <?php
    }else{
        echo "Debes rellenar el formulario entero para generar el gráfico.";
    }
    ?>
</body>
</html>