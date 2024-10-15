<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutas</title>
</head>
<body>
    <form action="frutas.php" method="get">
        <legend>Elige tu fruta favorita</legend>
        <input type="radio" name="frutas" id="Sandia" value="sandia" checked>
        <label for="sandia">Sand&iacute;a</label></br>
        <input type="radio" name="frutas" id="Manzana" value="manzana">
        <label for="Manzana">Manzana</label></br>
        <input type="radio" name="frutas" id="Cerezas" value="cerezas">
        <label for="Cerezas">Cerezas</label></br>
        <input type="radio" name="frutas" id="Pina" value="pina">
        <label for="Pina">Pi&ntilde;a</label></br>

        <button input type="submit" value="Enviar">Enviar</button>
    </form>
</body>
</html>