<?php
//Copia las clases del ejercicio anterior y modifícalas. 
//Crea en Persona el método estático toHtml(Persona $p), y modifica 
//en Empleado el mismo método toHtml(Persona $p), pero cambia la firma 
//para que reciba una Persona como parámetro. Para acceder a las propiedades 
//del empleado con la persona que recibimos como parámetro, comprobaremos su tipo: 

class Persona
{
    public function __construct(
        public string $nombre,
        public string $apellido,
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellido;
    }

    public static function toHTML(Persona $persona): string
    {
        $html = "Nombre completo: " . $persona->getNombreCompleto() . "<br>";

        return $html;
    }
}


class Empleado extends Persona
{
    public array $numsTelefono = [];
    public static int $sueldoTope = 199;

    public function __construct(
        string $nombre,
        string $apellido,
        public int $sueldo = 1000
    ) {
        parent::__construct($nombre, $apellido);
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
        if ($this->sueldo > self::$sueldoTope) {
            return true;
        } else {
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
        }
        return $html;
    }
}

$e1 = new Empleado("Sandra", "Pico");
echo Empleado::toHTML($e1);
?>