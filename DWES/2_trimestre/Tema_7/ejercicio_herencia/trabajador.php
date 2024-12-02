<?php
abstract class Trabajador extends Persona{
    public function __construct(
        string $nombre,
        string $apellido,
        int $edad,
        public array $telefonos = []
    )
    {
        parent::__construct($nombre, $apellido, $edad);
    }
    abstract public static function toHTML();

    abstract public function calcularSueldo();
}
?>