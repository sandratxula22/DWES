<?php
//Copia la clase del ejercicio anterior y modifícala. Completa el siguiente método con una cadena HTML 
//que muestre los datos de un empleado dentro de un párrafo y todos los teléfonos mediante una lista ordenada 
//(para ello, deberás crear un getter para los teléfonos):
//public static function toHtml(Empleado $emp): string

class Empleado{
    private array $numsTelefono = [];
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

    public static function toHTML(Empleado $empleado): string{
        $html = "Nombre completo: ".$empleado->getNombreCompleto()."<br>";
        $html .= "Sueldo: ".$empleado->getSueldo()."<br>";

        if (!empty($empleado->getNumsTelefono())) {
            $html .= "<ol>";
            foreach ($empleado->getNumsTelefono() as $telefono) {
                $html .= "<li>" . $telefono . "</li>";
            }
            $html .= "</ol>";
        } else {
            $html .= "No hay teléfonos registrados.<br>";
        }

        return $html;
    }
}


$empleado1 = new Empleado('Daniel', 'Gutiérrez');
echo Empleado::toHTML($empleado1);

$empleado1->anyadirTelefono(12432423);
$empleado1->anyadirTelefono(00000000);

echo Empleado::toHTML($empleado1);
?>