<?php
namespace Dwes\ProyectoVideoclub;

class Dvd extends Soporte{
    //atributos y constructor
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private array $idiomas,
        private string $formatPantalla
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    //métodos
    public function muestraResumen(): string{
        $html = parent::muestraResumen();
        $html .= "<b>Idiomas: </b>".implode(", ", $this->idiomas)."<br>";
        $html .= "<b>Formato de la pantalla: </b>".$this->formatPantalla."<br>";
        return $html;
    }
}
?>