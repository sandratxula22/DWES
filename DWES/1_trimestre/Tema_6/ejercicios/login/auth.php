<?php
session_start();

include("bbdd.php");

if(isset($_POST["user"], $_POST["password"])){
    $usuario = $_POST["user"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM datos_login WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            if($password = $row["pass"]){
                
            }
        }
    }
}
?>