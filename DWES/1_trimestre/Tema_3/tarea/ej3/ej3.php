<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <h2>Formulario de Atletas</h2>
    <form method="post" action="procesar.php">
        <?php
        //bucle para mostrar un formulario por cada atleta
        for ($i = 1; $i <= 10; $i++){
        ?>
            <fieldset>
                <legend>Atleta <?php echo $i; ?></legend>
                <label for="nombre<?php echo $i; ?>">Nombre:</label>
                <input type="text" value="Sandra" name="nombre<?php echo $i; ?>" required><br>

                <label for="edad<?php echo $i; ?>">Edad:</label>
                <input type="number" value="23" name="edad<?php echo $i; ?>" required><br>

                <label for="genero<?php echo $i; ?>">Género:</label>
                <select name="genero<?php echo $i; ?>" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select><br>

                <label for="tiempo1_<?php echo $i; ?>">Tiempo Carrera 1 (en minutos):</label>
                <input type="number" step="0.01" value="1.05" name="tiempo1_<?php echo $i; ?>" required><br>

                <label for="tiempo2_<?php echo $i; ?>">Tiempo Carrera 2 (en minutos):</label>
                <input type="number" step="0.01" value="1.02" name="tiempo2_<?php echo $i; ?>" required><br>
            </fieldset>
            <br>
        <?php
        }
        ?>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>