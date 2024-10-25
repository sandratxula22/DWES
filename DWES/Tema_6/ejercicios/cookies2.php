<?php
$name = "Sandra";
if(isset($_COOKIE[$name])){
    $idioma = $_COOKIE[$name];
}else{
    $idioma = 'ES';
}
if(isset($_POST["idioma"])){
    $idioma = $_POST["idioma"];
    setcookie($name, $idioma, time() + (24 * 60 * 60));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies - Idioma</title>
</head>
<body>
    <form action="" method="post">
        <select name="idioma">
            <option value="ES" <?php echo ($idioma == 'ES') ? 'selected' : ''; ?>>Español</option>
            <option value="EN" <?php echo ($idioma == 'EN') ? 'selected' : ''; ?>>Inglés</option>
            <option value="IT" <?php echo ($idioma == 'IT') ? 'selected' : ''; ?>>Italiano</option>
        </select>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?php
    if(isset($idioma)){
    echo $idioma;
    if($idioma == "ES"){
        echo "<h3>Hola, este es un texto de prueba en el idioma que has elegido.</h3>";
    }elseif($idioma == "EN"){
        echo "<h3>Hello, this is a test text in the language you have chosen.</h3>";
    }elseif($idioma == "IT"){
        echo "<h3>Ciao, questo è un testo di prova nella lingua che hai scelto.</h3>";
    }
    }
    ?>
</body>
</html>