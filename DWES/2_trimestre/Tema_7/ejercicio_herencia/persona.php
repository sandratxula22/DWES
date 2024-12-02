<?php
//Transforma Persona a una clase abstracta donde su método estático toHtml(Persona $p) tenga que ser redefinido en todos sus hijos.
abstract class Persona
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

    abstract public static function toHTML();
    
    public function __toString(): string
    {
        return "Nombre completo: " . $this->getNombreCompleto() . "<br>Edad: " . $this->edad;
    }
}
?>