<?php
include('bbdd.php');

$id = $_GET['id'];
$sql = "UPDATE cursos SET plazasOcu = plazasOcu + 1 WHERE id=$id";
$result = $conn->query($sql);
if ($result) {
    // Redirigir al usuario de vuelta a la página de cursos
    header("Location: ej1.php");
    exit();
} else {
    // Mostrar mensaje de error si la consulta falla
    echo "Error al actualizar el curso: " . $conn->error;
}

$conn->close();
?>