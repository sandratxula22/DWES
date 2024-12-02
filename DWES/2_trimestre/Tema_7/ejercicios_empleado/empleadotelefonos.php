<?php
//Copia la clase del ejercicio anterior y modifícala. Añade una propiedad privada que almacene un array de números de teléfonos. Añade los siguientes métodos:
//public function anyadirTelefono(int $telefono) : void → Añade un teléfono al array
//public function listarTelefonos(): string → Muestra los teléfonos separados por comas
//public function vaciarTelefonos(): void → Elimina todos los teléfonos

class Empleado{
    private string $nombre;
    private string $apellido;
    private int $sueldo;
    private array $numsTelefono;

    public function __construct(string $nombre, string $apellido, int $sueldo){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sueldo = $sueldo;
    }

    public function getNombre(): string{
        return $this->nombre;
    }
    public function getApellido(): string{
        return $this->apellido;
    }
    public function getSueldo(): int{
        return $this->sueldo;
    }
    public function getNumsTelefono(): array{
        return $this->numsTelefono;
    }
    public function setNombre($nombre): void{
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void{
        $this->apellido = $apellido;
    }
    public function setSueldo($sueldo): void{
        $this->sueldo = $sueldo;
    }
    public function setNumsTelefono($numsTelefono): void{
        $this->numsTelefono = $numsTelefono;
    }

    public function getNombreCompleto(): string{
        return $this->nombre." ".$this->apellido;
    }

    public function debePagarImpuestos(): bool{
        if($this->sueldo > 3333){
            return true;
        }else{
            return false;
        }
    }

    public function anyadirTelefono(int $telefono): void{
        $this->numsTelefono[] = $telefono;
    }

    public function listarTelefonos(): string{
        $telefonos = implode(", ", $this->numsTelefono);
        return $telefonos;
    }

    public function vaciarTelefonos(): void{
        $this->numsTelefono = [];
    }
}


$empleado1 = new Empleado('Daniel', 'Gutiérrez', '3333');
echo "Nombre completo: ".$empleado1->getNombreCompleto()."<br>";
echo "¿Debe pagar impuestos? ".($empleado1->debePagarImpuestos() ? "Sí" : "No"). "<br>";
$empleado1->anyadirTelefono(666333000);
$empleado1->anyadirTelefono(123456789);
echo "Teléfonos: ".$empleado1->listarTelefonos()."<br>";
$empleado1->vaciarTelefonos();
echo "Teléfonos: ".$empleado1->listarTelefonos()."<br>";
?>