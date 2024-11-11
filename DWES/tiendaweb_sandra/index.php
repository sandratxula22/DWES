<?php
//Sandra Pico Álvarez
//Página con el formulario para iniciar la sesión
//Y para verificar el inicio de sesión correcto o incorrecto
include('bbdd.php');
session_start();

if (isset($_SESSION['user'])) {
    // Si ya hay una sesión activa, redirigir directamente a home.php
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
        input[type="password"] {
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
        .error{
            margin-top: 20px;
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    //Para solo poder acceder si enviamos el formulario
    //Si no el else nos manda al index
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $user = $_POST['user'];
        $password = $_POST['password'];

        //Comprobar si el usuario existe en la base de datos
        $checksql = "SELECT * FROM restaurantes WHERE user = ?";
        $checkstmt = $conn->prepare($checksql);
        $checkstmt->bind_param("s", $user);
        $checkstmt->execute();
        $result = $checkstmt->get_result();

        // Si el usuario existe
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            //Verificar si la contraseña es correcta
            if (password_verify($password, $row['pass'])) {
                $_SESSION['user'] = $user;
                header("Location: home.php");
                exit();
            } else {
                $error = "Contraseña incorrecta";
            }
        } else {
            $error = "El usuario no existe";
        }
    }
    ?>
    <div>
        <h1>Login</h1>
        <form action="index.php" method="post">
            <label for="user">Usuario: </label>
            <input type="email" id="user" name="user" required><br>
            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" name="submit" value="Iniciar sesión">
        </form>
        <p>¿No tienes cuenta? <a href="signupauth.php">Regístrate</a></p>
    </div>
    <?php
        if(!empty($error)){
            echo "<div class='error'>$error</div>";
        }
        ?>
</body>

</html>