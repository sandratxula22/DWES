<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provincias</title>
    <style>
        ul{
            list-style: none;
            padding: 0;
        }
    </style>
</head>

<body>
    <form action="provincias.php" method="get">
        <legend>Escribe una provincia para buscar</legend>
        <ul>
            <li>
                <label for="provincia">Provincia:</label>
                <input type="text" id="provincia" name="provincia">
            </li>
        </ul>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>