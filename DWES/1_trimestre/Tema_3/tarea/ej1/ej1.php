<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    $mensaje = "";
    if(!isset($_POST["numsecret"])){
        $numerosecreto = rand(1, 1000);
    }else{
        $numerosecreto = $_POST["numsecret"];
    }

    //que no esté vacío (empty me tomaria 0 como vacío por eso uso "")
    if(isset($_POST["numero"]) && $_POST["numero"] !== ""){
        $numerousuario = $_POST["numero"];

        //si es -1, te has rendido
        if($numerousuario == -1){
            $mensaje = "TE HAS RENDIDO. EL NÚMERO ERA: $numerosecreto";
            //para reiniciar el juego se mete otro número al azar
            $numerosecreto = rand(1, 1000);
        }else{
            //si está fuera de los límites se avisa y no se mira si es menor o mayor
            if($numerousuario >1000 || $numerousuario < 1){
                $mensaje = "EL NÚMERO TIENE QUE ESTAR ENTRE 1 Y 1000";
            //a este else llegamos si el número no es -1 y esta dentro de los rangos
            }else{
                if($numerosecreto < $numerousuario){
                    $mensaje = "EL NÚMERO ES MENOR";
                }else if($numerosecreto > $numerousuario){
                    $mensaje = "EL NÚMERO ES MAYOR";
                }else{
                    $mensaje = "¡FELICIDADES! HAS ACERTADO EL NÚMERO SECRETO";
                    //para reiniciar el juego se mete otro número al azar
                    $numerosecreto = rand(1, 1000);
                }
            }
        }
    }else{
        $mensaje = "INTRODUCE UN NÚMERO";
    }
    
    ?>
    <div>
        <h2>Adivina el número</h2>
        <form action="" method="post">
            <label for="num">Introduce un número entre 1 y 1000 (o -1 para rendirte)</label><br>
            <input type="number" name="numero" id="num">
            <input type="hidden" name="numsecret" value="<?php echo $numerosecreto; ?>">
            <input type="submit" value="Adivinar">
        </form>
        <h3><?php echo $mensaje; ?></h3>
    </div>
</body>
</html>