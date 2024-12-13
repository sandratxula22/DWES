<?php
class Juego extends Soporte{
    //atributos y constructor
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private string $consola,
        private int $minNumJugadores,
        private int $maxNumJugadores,
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    //métodos
    public function muestraJugadoresPosibles(): string{
        $html = "Entre ".$this->minNumJugadores." y ".$this->maxNumJugadores;
        return $html;
    }

    public function muestraResumen(): string{
        $html = parent::muestraResumen();
        $html .= "<b>Consola: </b>".$this->consola." <br>";
        $html .= "<b>Rango de jugadores: </b>".$this->muestraJugadoresPosibles()." <br>";
        return $html;
    }
}
?>