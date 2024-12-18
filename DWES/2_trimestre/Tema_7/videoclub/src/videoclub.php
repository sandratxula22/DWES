<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\YaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

class Videoclub{
    //atributos y constructor
    private array $productos = [];
    private int $numProductos = 0;
    private array $socios = [];
    private int $numSocios = 0;
    private int $numProductosAlquilados = 0;
    private int $numTotalAlquileres = 0;

    public function __construct(
        private string $nombre
    ){}

    //métodos
    public function getNumProductosAlquilados(): int {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }

    public function incluirProducto(Soporte $producto): void{
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void{
        $cinta = new CintaVideo($titulo, $this->numProductos + 1, $precio, $duracion);
        $this->incluirProducto($cinta);
    }

    public function incluirDvd(string $titulo, float $precio, array $idiomas, string $pantalla){
        $dvd = new Dvd($titulo, $this->numProductos + 1, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ): void{
        $juego = new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }

    public function incluirSocio(string $nombre, int $maxAlquileresConcurrentes = 3): void{
        $socio = new Cliente($nombre, $this->numSocios + 1, $maxAlquileresConcurrentes);
        $this->socios[] = $socio;
        $this->numSocios++;
    }

    public function listarProductos(): void{
        echo "Lista de productos: <br>";
        foreach($this->productos as $producto){
            echo $producto->muestraResumen(). "<br>";
        }
    }

    
    public function listarSocios(): void{
        echo "Lista de socios: <br>";
        foreach($this->socios as $socio){
            echo $socio->muestraResumen(). "<br>";
        }
    }

    public function alquilarSocioProducto(int $numeroCliente, int $numeroSoporte): bool{
        $socioEncontrado = null;
        $productoEncontrado = null;

        //buscamos el socio
        foreach($this->socios as $socio){
            if($socio->getNumero() === $numeroCliente){
                $socioEncontrado = $socio;
                break;
            }
        }

        //buscamos el producto
        foreach($this->productos as $producto){
            if($producto->getNumero() === $numeroSoporte){
                $productoEncontrado = $producto;
                break;
            }
        }

        if($socioEncontrado && $productoEncontrado){
            $alquilerExito = $socioEncontrado->alquilar($productoEncontrado);
            if($alquilerExito){
                $productoEncontrado->alquilar();
                $this->numProductosAlquilados++;
                $this->numTotalAlquileres++;
                return true;
            }
            return false;
        }else{
            echo "No se pudo realizar el alquiler.<br>";
            if(!$socioEncontrado){
                throw new ClienteNoEncontradoException();
            }
            if(!$productoEncontrado){
                throw new SoporteNoEncontradoException();
            }
            return false;
        }
    }

    public function devolverSocioProducto(int $numeroCliente, int $numeroSoporte): bool {
        $socioEncontrado = null;
        $productoEncontrado = null;
    
        //buscamos el socio
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) {
                $socioEncontrado = $socio;
                break;
            }
        }
    
        //buscamos el producto
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() === $numeroSoporte) {
                $productoEncontrado = $producto;
                break;
            }
        }
    
        //si ambos existen
        if (!$socioEncontrado) {
            throw new ClienteNoEncontradoException();
        }
    
        if (!$productoEncontrado) {
            throw new SoporteNoEncontradoException();
        }

        $productoEncontrado->devolver();
        $this->numProductosAlquilados--;
        $this->numTotalAlquileres--;
        return $socioEncontrado->devolver($productoEncontrado->getNumero());
    }
    //alquilar varios productos
    public function alquilarSocioProductos(int $numeroCliente, array $numeroProductos): bool{
        $socioEncontrado = null;
        $productosAlquilar = [];

        //buscamos el socio
        foreach($this->socios as $socio){
            if($socio->getNumero() === $numeroCliente){
                $socioEncontrado = $socio;
                break;
            }
        }

        if (!$socioEncontrado) {
            throw new ClienteNoEncontradoException();
        }

        //comprobar si estan disponibles
        foreach($numeroProductos as $numProducto){
            $productoEncontrado = null;
            foreach($this->productos as $producto){
                //si el producto existe y no está alquilado
                if($producto->getNumero() === $numProducto && !$producto->esAlquilado()){
                    $productoEncontrado = $producto;
                    break;
                }
            }
            //si alguno de los productos no está disponible
            if ($productoEncontrado === null) {
                throw new SoporteNoEncontradoException();
                return false;
            }
            //si están disponibles los agregamos a la lista
            $productosAlquilar[] = $productoEncontrado;
        }

        //alquilar si estan disponibles
        foreach($productosAlquilar as $producto){
            $alquilerExito = $socioEncontrado->alquilar($producto);
            if (!$alquilerExito) {
                throw new YaAlquiladoException();
            }
            $producto->alquilar();
            $this->numProductosAlquilados++;
            $this->numTotalAlquileres++;
        }
        return true;
    }

    //devolver varios productos
    public function devolverSocioProductos(int $numeroCliente, array $numerosProductos): bool {
        $socioEncontrado = null;
        $productosDevolver = [];

        // Buscar el socio
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) {
                $socioEncontrado = $socio;
                break;
            }
        }

        if (!$socioEncontrado) {
            throw new ClienteNoEncontradoException();
        }

        // Buscar los productos que el socio tiene alquilados
        foreach ($numerosProductos as $numProducto) {
            $productoEncontrado = null;
            foreach ($this->productos as $producto) {
                if ($producto->getNumero() === $numProducto && $socioEncontrado->tieneAlquilado($producto)) {
                    $productoEncontrado = $producto;
                    break;
                }
            }

            // Si el socio no tiene alquilado alguno de los productos, no devolvemos nada
            if ($productoEncontrado === null) {
                throw new VideoclubException();
                return false;
            }

            $productosDevolver[] = $productoEncontrado;
        }

        // Devolver los productos
        foreach ($productosDevolver as $producto) {
            $socioEncontrado->devolver($producto->getNumero());
            $producto->devolver();
            $this->numProductosAlquilados--;
            $this->numTotalAlquileres--;
        }

        return true;
    }

}
?>