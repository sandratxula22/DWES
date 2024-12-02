<?php
//Copia la clase del ejercicio anterior y modifícala. Cambia la constante por 
//una variable estática sueldoTope, de manera que mediante getter/setter puedas modificar su valor.

class Empleado{
    private array $numsTelefono;
    private static int $sueldoTope = 199;

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
    public static function getSueldoTope(): int{
        return self::$sueldoTope;
    }
    public static function setSueldoTope(int $nuevoTope){
        self::$sueldoTope = $nuevoTope;
    }

    public function getNombreCompleto(): string{
        return $this->nombre." ".$this->apellido;
    }

    public function debePagarImpuestos(): bool{
        if($this->sueldo > self::$sueldoTope){
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
$empleado1->setSueldoTope(1002);
echo "¿Debe pagar impuestos? ".($empleado1->debePagarImpuestos() ? "Sí" : "No"). "<br>";
echo "<br>";
$empleado2 = new Empleado('Eva', 'Álvarez', '4300');
echo "Nombre completo: ".$empleado2->getNombreCompleto()."<br>";
echo "Sueldo: ".$empleado2->getSueldo()."<br>";
echo "¿Debe pagar impuestos? ".($empleado2->debePagarImpuestos() ? "Sí" : "No"). "<br>";

?>