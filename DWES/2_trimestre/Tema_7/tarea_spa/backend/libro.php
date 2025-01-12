<?php
include("bbdd.php");
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);

//Obtener el id_libro
$id_libro = $input['id_libro'];
$response = [];

//detalles del libro
$sql = "SELECT * FROM libros WHERE id_libro = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_libro);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $response["detalles"] = $result->fetch_assoc();
} else {
    $response["detalles"] = "No se encontraron detalles para este libro.";
}

//reseñas del libro
$sql_resenias = "SELECT r.id_resena, r.id_libro, u.email, r.puntuacion, r.comentario
                 FROM resenias r
                 INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
                 WHERE id_libro = ?";
$stmt_resenias = $conn->prepare($sql_resenias);
$stmt_resenias->bind_param("i", $id_libro);
$stmt_resenias->execute();
$result_resenias = $stmt_resenias->get_result();
$response["resenias"] = $result_resenias->fetch_all(MYSQLI_ASSOC);

echo json_encode($response);
exit();
?>
