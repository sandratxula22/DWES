<?php
include("bbdd.php");
session_start();
header('Content-Type: application/json');

$raw_data = file_get_contents("php://input");
$input = json_decode($raw_data, true);

$id_libro = $input['id_libro'];
$puntuacion = $input['puntuacion'];
$comentario = $input['comentario'];
$response = [];
$id_usuario = $_SESSION['id_usuario'];

//Comprobar si el usuario ya tiene una reseña para este libro
$sql_check = "SELECT * FROM resenias WHERE id_usuario = ? AND id_libro = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $id_usuario, $id_libro);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

$fecha = date("Y-m-d");

if ($result_check->num_rows > 0) {
    //Si ya existe, actualizar la reseña
    $sql_update = "UPDATE resenias SET puntuacion = ?, comentario = ?, fecha = ? WHERE id_usuario = ? AND id_libro = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("issii", $puntuacion, $comentario, $fecha, $id_usuario, $id_libro);
    if ($stmt_update->execute()) {
        $response["success"] = true;
        $response["message"] = "Reseña actualizada con éxito.";
    } else {
        $response["success"] = false;
        $response["message"] = "Error al actualizar la reseña.";
    }
} else {
    //Si no existe, insertar una nueva reseña
    $sql_insert = "INSERT INTO resenias (id_usuario, id_libro, puntuacion, comentario, fecha) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iiiss", $id_usuario, $id_libro, $puntuacion, $comentario, $fecha);
    if ($stmt_insert->execute()) {
        $response["success"] = true;
        $response["message"] = "Reseña actualizada con éxito.";
    } else {
        $response["success"] = false;
        $response["message"] = "Error al actualizar la reseña.";
    }
}

echo json_encode($response);
exit();
?>
