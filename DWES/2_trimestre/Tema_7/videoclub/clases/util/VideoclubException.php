<?php
namespace Dwes\ProyectoVideoclub\Util;

class VideoclubException extends \Exception {
    public function __construct(string $message = "Error en el videoclub.<br>", int $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function getExceptionMessage(): string{
        return "Error - ".$this->code.": ".$this->message;
    }
}

?>