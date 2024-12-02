<?php
//Copia la clase del ejercicio anterior y modifícala. Completa el siguiente método con una cadena HTML 
//que muestre los datos de un empleado dentro de un párrafo y todos los teléfonos mediante una lista ordenada 
//(para ello, deberás crear un getter para los teléfonos):
//public static function toHtml(Empleado $emp): string

class Empleado{
    public array $numsTelefono = [];
    public static int $sueldoTope = 199;

    public function __construct(
        public string $nombre, 
        public string $apellido, 
        public int $sueldo = 1000,
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
            $html .= "Teléfonos: <ul>";
            foreach ($empleado->getNumsTelefono() as $telefono) {
                $html .= "<li>" . $telefono . "</li>";
            }
            $html .= "</ul>";
        } else {
            $html .= "No hay teléfonos registrados.<br>";
        }

        return $html;
    }
}


$empleado1 = new Empleado('Daniel', 'Gutiérrez');
//echo Empleado::toHTML($empleado1);
//
//$empleado1->anyadirTelefono(12432423);
//$empleado1->anyadirTelefono(00000000);
//
//echo Empleado::toHTML($empleado1);

if($empleado1 instanceof Empleado){
    echo "Es un empleado<br>";
    echo "La clase es ".get_class($empleado1)."<br>";
    echo "<br>";
    class_alias("Empleado", "Persona");
    $empleado2 = new Persona('Eva', 'Álvarez', 4300);
    echo "Una persona es un ".get_class($empleado2)."<br>";
    //ver los métodos de la clase
    print_r(get_class_methods("Empleado"));
    echo "<br>";
    //propiedades variables de la clase Empleado
    print_r(get_class_vars("Empleado"));
    echo "<br>";
    //devuelve todas las propiedades de $empleado2
    print_r(get_object_vars($empleado2));
    echo "<br>";

    if(method_exists($empleado2,"toHTML")){
        echo Persona::toHTML($empleado2);
    }
}
?>