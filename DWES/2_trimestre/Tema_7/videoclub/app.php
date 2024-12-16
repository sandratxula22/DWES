<?php
// Incluir las clases necesarias
require_once "clases/soporte.php";
require_once "clases/cintavideo.php";
require_once "clases/dvd.php";
require_once "clases/juego.php";
require_once "clases/cliente.php";
require_once "clases/videoclub.php";


use Dwes\ProyectoVideoclub\Videoclub;

//Crear una instancia de Videoclub
$videoclub = new Videoclub("Blockbuster");

//Añadir productos
$videoclub->incluirCintaVideo("El Rey León", 3.50, 90);
$videoclub->incluirDvd("Matrix", 5.00, ["Inglés", "Español"], "Widescreen");
$videoclub->incluirJuego("FIFA 23", 60.00, "PS5", 1, 4);
$videoclub->incluirCintaVideo("Vaiana", 15.56, 145);

//Añadir socios
$videoclub->incluirSocio("Juan Pérez", 3);
$videoclub->incluirSocio("Ana López", 2);
$videoclub->incluirSocio("Sergio Pérez");//3 por defecto

//Listar los productos disponibles
echo "<h2>Productos disponibles:</h2>";
$videoclub->listarProductos();

//Listar los socios registrados
echo "<h2>Socios registrados:</h2>";
$videoclub->listarSocios();

//Intentar alquilar productos
echo "<h2>Alquileres:</h2>";
$videoclub->alquilarSocioProducto(1, 1); // Juan alquila El Rey León
$videoclub->alquilarSocioProducto(1, 2); // Juan alquila Matrix
$videoclub->alquilarSocioProducto(1, 2); // Ya alquilado
$videoclub->alquilarSocioProducto(1, 3); // Juan alquila FIFA 23 (debería alcanzar el límite)
$videoclub->alquilarSocioProducto(1, 4); // Juan ya no puede alquilar por límite
$videoclub->alquilarSocioProducto(2, 2); // Ana alquila Matrix
$videoclub->alquilarSocioProducto(4, 1); // Cliente no encontrado
$videoclub->alquilarSocioProducto(1, 5); // Producto no encontrado

//Mostrar el resumen final
echo "<h2>Estado del videoclub:</h2>";
$videoclub->listarProductos();
$videoclub->listarSocios();
?>