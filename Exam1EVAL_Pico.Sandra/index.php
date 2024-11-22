<?php
//inicio de sesión
include("bbdd.php");
session_start();
//si existe la sesion redirige
if(isset($_SESSION["user"])){
    header("Location: home.php");
    exit();
}

function iniciarSesion($conn)
{
    if (isset($_POST["submit"])) {
        $user = $_POST["user"];
        $password = $_POST["pass"];

        $sql = "SELECT * FROM Usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['password'] == $password) {
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['id_usuario'] = $row['id_usuario'];
                    header('Location: home.php');
                    exit();
                } else {
                    echo "<p style='color: red;'>Error, contraseña incorrecta</p>";
                }
            }
        }else{
            echo "<p style='color: red;'>Error, no existe el usuario.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form action="" method="post">
        <label for="user">Correo:</label>
        <input type="email" id="user" name="user"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass"><br>

        <input type="submit" name="submit" value="Iniciar sesión">
    </form>
    <?php
    iniciarSesion($conn);
    ?>
</body>

</html>