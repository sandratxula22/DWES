<?php
//Sandra Pico Álvarez
//Página con el formulario para registrarse
//Y para verificar el registro correcto o incorrecto
include('bbdd.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEEB;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        form p{
            margin-top: 0px;
            margin-bottom: 15px;
            color: red;
            font-weight: bold;
        }
        .success{
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    //variable para sacar el error por usuario ya registrado
    $error = '';
    $success = '';
    if(isset($_POST["submit"])){
        if(isset($_POST['user'], $_POST['password'], $_POST['direccion'])){
            $user = $_POST['user'];
            $pass = $_POST['password'];
            $direccion = $_POST['direccion'];
        
            //Comprobar si el usuario ya existe
            $checksql = "SELECT * FROM restaurantes WHERE user = ?";
            $checkstmt = $conn->prepare($checksql);
            $checkstmt->bind_param("s", $user);
            $checkstmt->execute();
            $result = $checkstmt->get_result();

            //si hay alguna línea significa que ese correo ya está registrado
            if($result->num_rows > 0){
                $error = "<p>El correo ya está registrado</p>";
            }else{
                $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

                $sql = "INSERT INTO restaurantes(user, pass, direccion) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $user, $hashedPassword, $direccion);

                if($stmt->execute()){
                    header("Location: signupauth.php?success=1");
                    exit();
                }
            }
        }
    }
    // Verificar si hay un parámetro de éxito en la URL
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        $success = "<div class='success'>
                        <p>Usuario registrado con éxito.</p>
                        <a href='index.php'>Inicia sesión</a>
                    </div>";
    }
    ?>
    <div>
        <h1>Signup</h1>
        <form action="signupauth.php" method="post">
            <label for="user">Usuario (email): </label>
            <input type="email" id="user" name="user" required><br>
            <?php
            if(!empty($error)){
                echo $error;
            }
            ?>
            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" required><br>
            <label for="direccion">Dirección: </label>
            <input type="text" id="direccion" name="direccion" required><br>


            <input type="submit" name="submit" value="Registrar usuario">
        </form>
    </div>
    <?php
    if(!empty($success)){
        echo $success;
    }
    ?>
</body>

</html>