<?php
//Copia la clase del ejercicio anterior y modifícala. Elimina los setters de nombre y apellidos, 
//de manera que dichos datos se asignan mediante el constructor (utiliza la sintaxis de PHP7). 
//Si el constructor recibe un tercer parámetro, será el sueldo del Empleado. Si no, se le asignará 1000€ como sueldo inicial.

class Empleado{
    private string $nombre;
    private string $apellido;
    private int $sueldo;
    private array $numsTelefono;

    public function __construct(string $nombre, string $apellido, int $sueldo = 1000){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sueldo = $sueldo;
    }

    public function getSueldo(): int{
        return $this->sueldo;
    }
    public function getNumsTelefono(): array{
        return $this->numsTelefono;
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


$empleado1 = new Empleado('Daniel', 'Gutiérrez');
echo "Nombre completo: ".$empleado1->getNombreCompleto()."<br>";
echo "Sueldo: ".$empleado1->getSueldo()."<br>";
echo "¿Debe pagar impuestos? ".($empleado1->debePagarImpuestos() ? "Sí" : "No"). "<br>";
echo "<br>";
$empleado2 = new Empleado('Eva', 'Álvarez', '4300');
echo "Nombre completo: ".$empleado2->getNombreCompleto()."<br>";
echo "Sueldo: ".$empleado2->getSueldo()."<br>";
echo "¿Debe pagar impuestos? ".($empleado2->debePagarImpuestos() ? "Sí" : "No"). "<br>";

?>