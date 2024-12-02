<?php
//Modifica la clase y utiliza la sintaxis de PHP 8 de promoción de las propiedades del constructor.

class Empleado{
    private array $numsTelefono;

    public function __construct(
        private string $nombre, 
        private string $apellido, 
        private int $sueldo = 1000,
    ){}

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