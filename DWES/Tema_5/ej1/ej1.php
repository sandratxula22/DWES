<?php
include('bbdd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBDD</title>
    <style>
        table {
            text-align: center;
            border-collapse: collapse;
        }

        th {
            background-color: black;
            color: white;
        }

        th,
        td {

            padding: 0 30px;
        }

        td:first-child {
            text-align: left;
        }

        li span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM cursos";
    $result = $conn->query($sql);

    if ($result) {
        $totales = 0;
        $ocupadas = 0;
        ?>
        <h1>Lista de cursos</h1>
        <table>
            <tr>
                <th>Cursos disponibles</th>
                <th>Plazas totales</th>
                <th>Plazas disponibles</th>
                <th></th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                $disponibles =  $row["plazasDisp"] - $row["plazasOcu"];
                $totales += $row["plazasDisp"];
                $ocupadas += $row["plazasOcu"];
                $porcentaje = round($ocupadas/$totales * 100, 2);


                if ($disponibles == 0) {
                    ?>
                    <tr style="text-decoration: line-through;">
                    <?php
                } else {
                    ?>
                    <tr>
                    <?php
                }
                    ?>
                    <td><?php echo $row["titulo"]; ?></td>
                    <td><?php echo $row["plazasDisp"]; ?></td>
                    <td><?php echo $disponibles; ?></td>
                    <td>
                        <?php
                        if ($disponibles > 0) {
                            ?>
                            <a href="actualizar.php?id=<?php echo $row['id']; ?>">Añadir plaza</a>
                            <?php
                        }
                        ?>
                    </td>
                    </tr>
                <?php
            }
                ?>
        </table>
        <h2>Resumen de ocupación:</h2>
        <ul>
            <li><span>Plazas totales ocupadas: </span><?php echo $totales; ?></li>
            <li><span>Plazas ocupadas: </span><?php echo $ocupadas; ?></li>
            <li><span>Porcentaje de ocupación: </span><?php echo $porcentaje."%"; ?></li>
        </ul>
    <?php
        $result->free();
    } else {
        echo "Error en la consulta: " . $conn->error;
    }
    ?>
</body>

</html>