<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Introduce un número para imprimir su tabla de multiplicar</label><br>
        <input type="number" name="numero" id="num"><br>
        <input type="submit" value="Enviar"> 
    </form>
    <?php
    function tablaMultiplicar($x){
        $resultado = "";
        for($i=0;$i<=10;$i++){
            $resultado .= "<p>".$x."*".$i." = ".($x*$i)."</p>";
        }
        return $resultado;
    }
    if(isset($_POST["numero"]) && !empty($_POST["numero"])){
        echo tablaMultiplicar($_POST["numero"]);
    }
    ?>

</body>
</html>