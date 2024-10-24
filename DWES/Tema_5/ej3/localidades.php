<?php
include('bbdd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localidades</title>
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
    $n_provincia = $_POST["provincias"];
    $sql ="SELECT * FROM localidades WHERE n_provincia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $n_provincia);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        ?>
        <div>
            <h2>Elige una localidad</h2>
            <form action="" method="post">
                <label for="localidades">Localidades: </label>
                <select name="localidades" id="localidades">
                    <?php
                    while($row = $result->fetch_assoc()){
                    ?>
                        <option value="<?php echo $row["id_localidad"]; ?>"><?php echo $row["nombre"]?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="provincias" value="<?php echo $n_provincia; ?>">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <?php
    }else{
        echo "Error en la consulta: " . $conn->error;
    }
    $stmt->close();

    if(isset($_POST["submit"])){
        echo "hola";
    }
    ?>
</body>
</html>