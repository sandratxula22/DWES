<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Procesar</title>
</head>
<body>
    <?php
    //Para que no se pueda acceder sin enviar el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $texto = $_POST['texto'];
        $clave = $_POST['clave'];
        $accion = $_POST['accion'];
        
        //función que encripta o desencripta el texto
        function procesarText($texto, $clave, $accion){
            $res = "";
            foreach(str_split($texto) as $char){
                $ASCII = ord($char);
                if($accion == "encriptar"){
                    $nuevo = $ASCII + $clave;
                }else{
                    $nuevo = $ASCII - $clave;
                }
                $res .= chr($nuevo);
            }
            return $res;
        }

        //Comprobamos si cumple las condiciones y si las cumple usamos la función
        if(strlen($texto)>= 10 && $clave >=1 && $clave <= 99){
            $accionTexto = "";
            if($accion == "encriptar"){
                $accionTexto = "Texto encriptado";
            }else{
                $accionTexto = "Texto desencriptado";
            }
            echo "<h2>".$accionTexto."</h2>";
            echo procesarText($texto, $clave, $accion);
        }else{
            echo "<p>ERROR. El texto tiene que tener más de 10 caracteres y la clave debe estar entre 1 y 99.</p>";
        }
    }else{
        echo "<h1>Por favor envía el formulario</h1>";
    }
    ?>
</body>
</html>