<?php
// Incluir las clases necesarias
require_once __DIR__ . '/vendor/autoload.php';

use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;
use Dwes\ProyectoVideoclub\Util\YaAlquiladoException;
use Dwes\ProyectoVideoclub\Videoclub;


//Crear una instancia de Videoclub
$videoclub = new Videoclub("Blockbuster");

// Crear nuevos socios
$videoclub->incluirSocio("Pedro Gómez", 5); // Nuevo socio con límite 5 productos
$videoclub->incluirSocio("Laura García", 3); // Nuevo socio con límite 3 productos
$videoclub->incluirSocio("Carlos Martínez"); // Nuevo socio con límite por defecto (3 productos)

// Listar los nuevos socios para verificar que se añadieron correctamente
echo "<h2>Socios registrados:</h2>";
$videoclub->listarSocios();
// Incluir nuevos productos
$videoclub->incluirCintaVideo("Inception", 4.50, 120); // Nueva película
$videoclub->incluirDvd("The Matrix Reloaded", 6.00, ["Español", "Inglés"], "Widescreen"); // Nuevo DVD
$videoclub->incluirJuego("The Last of Us Part II", 70.00, "PS5", 1, 1); // Nuevo juego
$videoclub->incluirCintaVideo("The Lion King", 3.99, 88); // Nueva película
$videoclub->incluirDvd("Avengers: Endgame", 8.00, ["Español", "Inglés", "Francés"], "Full HD"); // Nuevo DVD

// Listar productos para verificar que se añadieron correctamente
echo "<h2>Productos disponibles:</h2>";
$videoclub->listarProductos();

// Intentar alquilar varios productos a la vez con los nuevos productos
echo "<h2>Alquilar varios productos:</h2>";

try {
    // Juan intenta alquilar Inception, The Matrix Reloaded y The Last of Us Part II
    $result = $videoclub->alquilarSocioProductos(1, [1, 2, 3]);
    if ($result) {
        echo "Juan ha alquilado varios productos con éxito.<br>";
    } else {
        echo "No se pudieron alquilar todos los productos.<br>";
    }

    // Juan intenta alquilar Inception, The Lion King y Avengers: Endgame
    $result = $videoclub->alquilarSocioProductos(1, [1, 4, 5]);
    if ($result) {
        echo "Juan ha alquilado varios productos con éxito.<br>";
    } else {
        echo "No se pudieron alquilar todos los productos.<br>";
    }

    // Ana intenta alquilar The Matrix Reloaded y The Last of Us Part II
    $result = $videoclub->alquilarSocioProductos(2, [4, 5]);
    if ($result) {
        echo "Ana ha alquilado varios productos con éxito.<br>";
    } else {
        echo "No se pudieron alquilar todos los productos.<br>";
    }
} catch (YaAlquiladoException $e) {
    echo $e->getExceptionMessage();
} catch (CupoSuperadoException $e) {
    echo $e->getExceptionMessage();
} catch (ClienteNoEncontradoException $e) {
    echo $e->getExceptionMessage();
} catch (SoporteNoEncontradoException $e) {
    echo $e->getExceptionMessage();
} catch (VideoclubException $e) {
    echo $e->getMessage();
}
?>