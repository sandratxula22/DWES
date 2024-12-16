<?php
namespace Dwes\ProyectoVideoclub\Util;

class ClienteNoEncontradoException extends VideoclubException{
    public function __construct($message = "No se ha encontrado el cliente.<br>", $code = 1, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>