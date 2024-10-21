<?php
include("bbdd.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }
        th, td{
            padding: 5px;
            border: 1px solid black;
        }
        th {
            color: white;
            background-color: rgb(102,178,255);
        }
    </style>
</head>

<body>
    <?php
    $provincia = $_GET["provincia"];
    echo "<h1>LOCALIDADES DE ".strtoupper($provincia)."</h1>";
    //paginación
    $pagina_max = 25;
    //la página en la que nos encontramos
    if(isset($_GET["pagina"])){
        $paginaActual = $_GET["pagina"];
    }else{
        $paginaActual = 1;
    }
    //el índice de inicio
    if($paginaActual > 1){
        $inicio = $paginaActual * $pagina_max - $pagina_max;
    }else{
        $inicio = 0;
    }

    $sql = "SELECT * FROM provincias WHERE LOWER(nombre) = LOWER(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $provincia);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nprovincia = $row["n_provincia"];
            
            //obtener el total de localidades
            $sqlTotal = "SELECT COUNT(*) FROM localidades WHERE n_provincia = ?";
            $stmtTotal = $conn->prepare($sqlTotal);
            $stmtTotal->bind_param("i", $nprovincia);
            $stmtTotal->execute();
            $stmtTotal->bind_result($totalLocalidades);
            $stmtTotal->fetch();
            $stmtTotal->close();

            $totalPaginas = ceil($totalLocalidades / $pagina_max);

            
            $sql2 = "SELECT * FROM localidades WHERE n_provincia = ? LIMIT $inicio, $pagina_max";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("i", $nprovincia);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            ?>
            <table>
                <tr>
                    <th>Localidad</th>
                    <th>Población</th>
                </tr>
            <?php
            while($row2 = $result2->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row2["nombre"]; ?></td>
                    <td><?php echo $row2["poblacion"]; ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            <?php
            //paginación
            ?><div><?php
            if($paginaActual > 1){
                echo "<a href='?provincia=$provincia&pagina=".($paginaActual - 1)."'>Anterior</a> ";
            }

            for($i=1;$i<=$totalPaginas;$i++){
                echo "<a href='?provincia=$provincia&pagina=".$i."'>".$i."</a> ";
            }

            if($paginaActual < $totalPaginas){
                echo "<a href='?provincia=$provincia&pagina=".($paginaActual + 1)."'>Siguiente</a>";
            }
            ?></div><?php
            $stmt2->close();
        }
    } else {
        echo "No se encontró la provincia.";
    }

    $stmt->close();
    ?>
</body>

</html>