<?php
namespace Dwes\ProyectoVideoclub\Util;

class YaAlquiladoException extends VideoclubException{
    public function __construct($message = "El soporte ya está alquilado.<br>", $code = 4, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>