<?php
//Copia la clase del ejercicio anterior en 307Empleado.php y modifícala.
//Crea una clase Persona que sea padre de Empleado, de manera que Persona
//contenga el nombre y los apellidos, y en Empleado quede el salario y los teléfonos.

class Persona{
    public function __construct(
        public string $nombre,
        public string $apellido,
    ){}

    public function getNombre(): string{
        return $this->nombre;
    }
    public function getApellido(): string{
        return $this->apellido;
    }
    public function setNombre($nombre): void{
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void{
        $this->apellido = $apellido;
    }

    public function getNombreCompleto(): string{
        return $this->nombre." ".$this->apellido;
    }
}


class Empleado extends Persona{
    public array $numsTelefono = [];
    public static int $sueldoTope = 199;

    public function __construct(
        string $nombre, 
        string $apellido, 
        public int $sueldo = 1000
    ){
        parent::__construct($nombre, $apellido);
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
    public static function getSueldoTope(): int{
        return self::$sueldoTope;
    }
    public static function setSueldoTope(int $nuevoTope){
        self::$sueldoTope = $nuevoTope;
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

$e1 = new Empleado("Sandra", "Pico");

?>