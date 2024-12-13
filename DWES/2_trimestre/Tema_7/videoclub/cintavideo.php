<?php
class CintaVideo extends Soporte{
    //atributos y constructor
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private int $duracion
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    //métodos
    public function muestraResumen(): string{
        $html = parent::muestraResumen();
        $html .= "<b>Duración: </b>".$this->duracion." minutos<br>";
        return $html;
    }
}
?>