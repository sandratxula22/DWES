<?php
namespace Dwes\ProyectoVideoclub\Util;

class CupoSuperadoException extends VideoclubException{
    public function __construct($message = "Se ha superado el cupo de alquileres para este usuario.<br>", $code = 2, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>