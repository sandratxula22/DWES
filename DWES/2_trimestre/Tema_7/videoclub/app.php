<?php
// Incluir las clases necesarias
require_once __DIR__ . '/vendor/autoload.php';

use Dwes\ProyectoVideoclub\Soporte;
use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
use Dwes\ProyectoVideoclub\Util\YaAlquiladoException;
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
try{
    $videoclub->alquilarSocioProducto(1, 1); // Juan alquila El Rey León
    $videoclub->alquilarSocioProducto(1, 2); // Juan alquila Matrix
    $videoclub->alquilarSocioProducto(1, 2); // Ya alquilado
    //No sigue aquí porque una vez falla ya no continúa
    $videoclub->alquilarSocioProducto(1, 3); // Juan alquila FIFA 23 (debería alcanzar el límite)
    $videoclub->alquilarSocioProducto(1, 4); // Juan ya no puede alquilar por límite
    $videoclub->alquilarSocioProducto(2, 2); // Ana alquila Matrix
    $videoclub->alquilarSocioProducto(4, 1); // Cliente no encontrado
    $videoclub->alquilarSocioProducto(1, 5); // Producto no encontrado
}catch(YaAlquiladoException $e){
    echo $e->getExceptionMessage();
}catch(CupoSuperadoException $e){
    echo $e->getExceptionMessage();
}catch(ClienteNoEncontradoException $e){
    echo $e->getExceptionMessage();
}catch(SoporteNoEncontradoException $e){
    echo $e->getExceptionMessage();
}catch(VideoclubException $e){
    echo $e->getMessage();
}

try{
    $videoclub->alquilarSocioProducto(1, 3); // Juan alquila FIFA 23 (debería alcanzar el límite)
    $videoclub->alquilarSocioProducto(1, 4); // Juan ya no puede alquilar por límite
}catch(CupoSuperadoException $e){
    echo $e->getExceptionMessage();
}

try{
    $videoclub->alquilarSocioProducto(2, 2); // Ana alquila Matrix
    $videoclub->alquilarSocioProducto(4, 1); // Cliente no encontrado
}catch(ClienteNoEncontradoException $e){
    echo $e->getExceptionMessage();
}

try{
    $videoclub->alquilarSocioProducto(1, 5); // Producto no encontrado
}catch(SoporteNoEncontradoException $e){
    echo $e->getExceptionMessage();
}

//Mostrar el resumen final
echo "<h2>Estado del videoclub:</h2>";
$videoclub->listarProductos();
$videoclub->listarSocios();
?>