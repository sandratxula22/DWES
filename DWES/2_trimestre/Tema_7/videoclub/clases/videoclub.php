<?php
namespace Dwes\ProyectoVideoclub;

class Videoclub{
    //atributos y constructor
    private array $productos = [];
    private int $numProductos = 0;
    private array $socios = [];
    private int $numSocios = 0;

    public function __construct(
        private string $nombre
    ){}

    //métodos
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
        $socioEncontrado = "";
        $productoEncontrado = "";

        //buscamos el socio
        foreach($this->socios as $socio){
            if($socio->getNumero() === $numeroCliente){
                $socioEncontrado = $socio;
            }
        }

        //buscamos el producto
        foreach($this->productos as $producto){
            if($producto->getNumero() === $numeroSoporte){
                $productoEncontrado = $producto;
            }
        }

        if($socioEncontrado && $productoEncontrado){
            return $socioEncontrado->alquilar($productoEncontrado);
        }else{
            echo "No se pudo realizar el alquiler.<br>";
            if(!$socioEncontrado){
                echo "Cliente no encontrado.<br>";
            }
            if(!$productoEncontrado){
                echo "Producto no encontrado.<br>";
            }
            return false;
        }
    }
}
?>