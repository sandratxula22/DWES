<?php
include("bbdd.php");

function iniciarSesion($conn)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $user = $data['user'];
        $password = $data['pass'];

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
                    echo json_encode(['success' => true]);
                    exit();
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error, contraseña incorrecta']);
                    exit();
                }
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error, usuario no encontrado']);
            exit();
        }
    }
}

iniciarSesion($conn);
?>