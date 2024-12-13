<?php
require_once("soporte.php");
require_once("cintavideo.php");
require_once("dvd.php");
require_once("juego.php");
require_once("cliente.php");

echo "<u>SOPORTE</u><br>";
$soporte = new Soporte("Película", 123, 9.50);
echo $soporte->muestraResumen();

echo "<br><u>Cinta de Vídeo</u><br>";

$cintaVideo = new CintaVideo("Vaiana", 01, 20.55, 145);
$cintaVideo2 = new CintaVideo("Toy Story 3", 05, 10.75, 130);
echo $cintaVideo->muestraResumen();

echo "<br><u>DVD</u><br>";

$dvd = new Dvd("Chruek", 02, 15.65, ["Español", "Inglés", "Checo"], "Widescreen");
echo $dvd->muestraResumen();

echo "<br><u>Juego</u><br>";
$juego = new Juego("COD", 03, 69.99, "PS5", 1, 6);
$juego2 = new Juego("Indiana Jones", 04, 9.99, "PC", 1, 2);
echo $juego->muestraResumen();

echo "<br><u>Cliente</u><br>";
$cliente = new Cliente("Sandra Pico", 1, 4);
$cliente->alquilar($cintaVideo);
$cliente->alquilar($dvd);
$cliente->alquilar($juego);
$cliente->alquilar($juego);
$cliente->alquilar($juego2);
$cliente->alquilar($cintaVideo2);
$cliente->devolver(3);
$cliente->alquilar($cintaVideo2);

echo $cliente->muestraResumen();
?>