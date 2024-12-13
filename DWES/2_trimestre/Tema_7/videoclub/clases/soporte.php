<?php
class Soporte{
    //atributos y constructor
    public function __construct(
        private string $titulo,
        private int $numero,
        private float $precio
    ){}

    //métodos
    public function getPrecio(): float{
        return $this->precio;
    }

    public function getPrecioConIva(): float{
        return $this->precio * 1.21;
    }

    public function getNumero(): int{
        return $this->numero;
    }

    public function muestraResumen(): string{
        $html = "<b>Título:</b> ".$this->titulo."<br>";
        $html .= "<b>Número:</b> ".$this->numero."<br>";
        $html .= "<b>Precio sin IVA:</b> ".$this->precio."€<br>";
        $html .= "<b>Precio con IVA:</b> ".$this->getPrecioConIva()."€<br>";
        
        return $html;
    }
}
?>