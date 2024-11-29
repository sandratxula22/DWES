<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Formulario de encriptación/desencriptación</h1>
    <form action="procesar.php" method="post">
        <label for="texto">Texto:</label><br>
        <input type="text" id="texto" name="texto" required><br><br>

        <label for="clave">Clave:</label><br>
        <input type="number" id="clave" name="clave" required><br><br>

        <label>Acción:</label><br>
        <input type="radio" id="encriptar" name="accion" value="encriptar" checked>
        <label for="encriptar">Encriptar</label><br>
        <input type="radio" id="desencriptar" name="accion" value="desencriptar">
        <label for="desencriptar">Desencriptar</label><br><br>

        <input type="submit" value="Procesar">
    </form>
</body>
</html>