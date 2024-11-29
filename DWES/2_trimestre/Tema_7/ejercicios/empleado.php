<?php
//Crea una clase Empleado con su nombre, apellidos y sueldo. Encapsula las propiedades mediante getters/setters y añade métodos para:
//Obtener su nombre completo → getNombreCompleto(): string
//Que devuelva un booleano indicando si debe o no pagar impuestos (se pagan cuando el sueldo es superior a 3333€) → debePagarImpuestos(): bool

class Empleado{
    protected string $nombre;
    protected string $apellido;
    protected int $sueldo;

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
    public function setNombre($nombre): void{
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void{
        $this->apellido = $apellido;
    }
    public function setSueldo($sueldo): void{
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto(): string{
        return $this->nombre." ".$this->apellido;
    }

    public function debePagarImpuestos(): bool{
        return $this->sueldo > 3333;
    }
}


$empleado1 = new Empleado('Daniel', 'Gutiérrez', '3333');
echo "Nombre completo: ".$empleado1->getNombreCompleto()."<br>";
echo "¿Debe pagar impuestos? ".($empleado1->debePagarImpuestos() ? "Sí" : "No"). "<br>";

$empleado2 = new Empleado('Eva', 'Álvarez', '4300');
echo "Nombre completo: ".$empleado2->getNombreCompleto()."<br>";
echo "¿Debe pagar impuestos? ".($empleado2->debePagarImpuestos() ? "Sí" : "No"). "<br>";
?>