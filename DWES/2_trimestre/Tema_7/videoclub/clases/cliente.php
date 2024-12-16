<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\YaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;

class Cliente{
    //atributos y constructor
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    public function __construct(
        private string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente
    )
    {}

    //métodos
    public function getNumero(): int {
        return $this->numero;
    }

    public function tieneAlquilado(Soporte $soporte): bool{
        foreach($this->soportesAlquilados as $alquilado){
            if($alquilado === $soporte){
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $soporte): bool{
        if($this->numSoportesAlquilados < $this->maxAlquilerConcurrente){
            if(!$this->tieneAlquilado($soporte)){
                $this->soportesAlquilados[] = $soporte;
                $this->numSoportesAlquilados++;
                echo "Soporte ".$soporte->getNumero()." alquilado con éxito.<br>";
                return true;
            }else{
                throw new YaAlquiladoException();
            }
        }else{
            throw new CupoSuperadoException();
        }
    }

    public function devolver(int $numSoporte): bool{
        foreach($this->soportesAlquilados as $index => $soporte){
            if($soporte->getNumero() === $numSoporte){
                unset($this->soportesAlquilados[$index]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados);
                $this->numSoportesAlquilados--;
                echo "Soporte ".$numSoporte." devuelto con éxito.<br>";
                return true;
            }
        }
        echo "Soporte ".$numSoporte." no encontrado entre los alquileres.<br>";
        return false;
    }

    public function muestraResumen(): string{
        $html = "<b>Cliente:</b> ".$this->nombre." (ID: ".$this->numero.")<br>";
        $html .= "<b>Máximo de alquileres concurrentes:</b> ".$this->maxAlquilerConcurrente."<br>";
        $html .= "<b>Soportes alquilados actualmente:</b> ".$this->numSoportesAlquilados."<br>";
        $html .= "<b>Lista de soportes alquilados:</b> <br>";
        $html .= "<ul>";
        foreach($this->soportesAlquilados as $soporte){
            $html .= "<li>".$soporte->muestraResumen()."</li>";
        }
        $html .= "</ul>";
        return $html;
    }
}
?>