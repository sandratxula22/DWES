<?php
session_start();

if (isset($_SESSION["user"])) {
    echo json_encode(["authenticated" => true]);
} else {
    echo json_encode(["authenticated" => false]);
}
?>