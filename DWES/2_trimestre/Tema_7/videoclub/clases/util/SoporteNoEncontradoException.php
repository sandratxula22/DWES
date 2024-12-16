<?php
namespace Dwes\ProyectoVideoclub\Util;

class SoporteNoEncontradoException extends VideoclubException{
    public function __construct($message = "El soporte no se ha encontrado.<br>", $code = 3, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>