<?php
//Copia las clases del ejercicio anterior y modifícalas.
//Añade nuevos métodos que hagan una representación de todas 
//las propiedades de las clases Persona y Empleado, de forma similar 
//a los realizados en HTML, pero sin que sean estáticos, de manera
//que obtenga los datos mediante $this.
//function public __toString(): string

class Persona
{
    public function __construct(
        public string $nombre,
        public string $apellido,
        public int $edad
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getEdad(): int{
        return $this->edad;
    }
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setEdad($edad): void{
        $this->edad = $edad;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellido;
    }

    public static function toHTML(Persona $persona): string
    {
        $html = "Nombre completo: " . $persona->getNombreCompleto() . "<br>";
        $html .= "Edad: ".$persona->getEdad()."<br>";

        return $html;
    }
    public function __toString(): string
    {
        return "Nombre completo: " . $this->getNombreCompleto() . "<br>Edad: " . $this->edad;
    }
}


class Empleado extends Persona
{
    public array $numsTelefono = [];
    public static int $sueldoTope = 199;
    public static int $edadTope = 21;

    public function __construct(
        string $nombre,
        string $apellido,
        string $edad,
        public int $sueldo = 1000
    ) {
        parent::__construct($nombre, $apellido, $edad);
    }

    public function getSueldo(): int
    {
        return $this->sueldo;
    }
    public function getNumsTelefono(): array
    {
        return $this->numsTelefono;
    }
    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }
    public function setNumsTelefono($numsTelefono): void
    {
        $this->numsTelefono = $numsTelefono;
    }
    public static function getSueldoTope(): int
    {
        return self::$sueldoTope;
    }
    public static function setSueldoTope(int $nuevoTope)
    {
        self::$sueldoTope = $nuevoTope;
    }

    public function debePagarImpuestos(): bool
    {
        if($this->edad > self::$edadTope){
            if ($this->sueldo > self::$sueldoTope) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function anyadirTelefono(int $telefono): void
    {
        $this->numsTelefono[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        $telefonos = implode(", ", $this->numsTelefono);
        return $telefonos;
    }

    public function vaciarTelefonos(): void
    {
        $this->numsTelefono = [];
    }

    public static function toHTML(Persona $persona): string
    {
        $html = parent::toHTML($persona);

        if ($persona instanceof Empleado) {
            $empleado = $persona;
            $html .= "Sueldo: " . $empleado->getSueldo() . "<br>";

            if (!empty($empleado->getNumsTelefono())) {
                $html .= "Teléfonos: <ul>";
                foreach ($empleado->getNumsTelefono() as $telefono) {
                    $html .= "<li>" . $telefono . "</li>";
                }
                $html .= "</ul>";
            } else {
                $html .= "No hay teléfonos registrados.<br>";
            }
            $html .=  "¿Debe pagar impuestos? ".($empleado->debePagarImpuestos() ? "Sí" : "No"). "<br>";
        }
        return $html;
    }
    public function __toString(): string
    {
        $telefonos = !empty($this->numsTelefono) ? implode(", ", $this->numsTelefono) : "No hay teléfonos registrados";
        return parent::__toString() . "<br>Sueldo: " . $this->sueldo . "<br>Teléfonos: " . $telefonos . "<br>¿Debe pagar impuestos? " . ($this->debePagarImpuestos() ? "Sí" : "No");
    }
}

$e1 = new Empleado("Sandra", "Pico", 20);
$e1->anyadirTelefono(123456789);
$e1->anyadirTelefono(123142342);
echo $e1;

?>