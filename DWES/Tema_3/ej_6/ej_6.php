<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="grafico.php" method="post">
        <?php
        $deptos = ["Ventas", "Desarrollo", "Operaciones", "Calidad", "Atención al cliente"];
        foreach($deptos as $depto){
        ?>
        <legend><strong><?php echo $depto; ?></strong></legend>
        <label for="ing_ant_<?php echo $depto; ?>">Ingreso anterior</label>
        <input type="number" name="ing_ant[]" id="ing_ant_<?php echo $depto; ?>"><br>
        <label for="ing_act_<?php echo $depto; ?>">Ingreso actual</label>
        <input type="number" name="ing_act[]" id="ing_act_<?php echo $depto; ?>"><br>
        <br>
        <?php
        }
        ?>
        <input type="submit" value="Enviar" name="submit">
    </form>
</body>
</html>