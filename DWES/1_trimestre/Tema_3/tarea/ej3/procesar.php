<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ejercicio 3</title>
</head>
<body>
<?php
    //Procesar los datos después de enviar el formulario para que no se pueda acceder sin enviarlo
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        ?>
        <h2>Datos de los Atletas</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Tiempo Carrera 1 (min)</th>
                <th>Tiempo Carrera 2 (min)</th>
              </tr>
        <?php
        //Mostrar los datos
        for ($i = 1; $i <= 10; $i++) {
            $nombre = $_POST["nombre$i"];
            $edad = $_POST["edad$i"];
            $genero = $_POST["genero$i"];
            $tiempo1 = $_POST["tiempo1_$i"];
            $tiempo2 = $_POST["tiempo2_$i"];

            ?>
            <tr>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $edad; ?></td>
                <td><?php echo $genero; ?></td>
                <td><?php echo $tiempo1; ?></td>
                <td><?php echo $tiempo2; ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
    ?>
</body>
</html>