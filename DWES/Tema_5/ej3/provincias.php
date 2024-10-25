<?php
include('bbdd.php');

// Verificar si se ha enviado una comunidad
if (!isset($_POST["comunidades"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #ff8080;
        }

        div {
            padding: 2rem;
            padding-top: 0.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.7);
            background-color: rgba(255, 253, 208, 0.9);
            border-radius: 15px;
        }

        form {
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #2e2e2e;
            font-size: 2rem;
        }
    </style>
</head>
<body>
<?php
    $id_comu = $_POST["comunidades"];
    $sql ="SELECT * FROM provincias WHERE id_comunidad = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_comu);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        ?>
        <div>
            <h2>Elige una provincia</h2>
            <form action="localidades.php" method="post">
                <label for="provincias">Provincias: </label>
                <select name="provincias" id="provincias">
                    <?php
                    while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row["n_provincia"]; ?>"><?php echo $row["nombre"]?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </div>
        <?php
    }else{
        echo "Error en la consulta: " . $conn->error;
    }
    $stmt->close();
    ?>
</body>
</html>