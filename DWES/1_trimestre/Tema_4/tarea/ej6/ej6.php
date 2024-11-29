<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <style>
        ul{
            list-style: none;
            padding: 0;
        }
    </style>
</head>

<body>
    <h1>NÚMEROS PRIMOS</h1>
    <form action="procesar.php" method="post">
        <legend>Elige un número para saber qué números primos hay entre el 1 y tu número</legend>
        <ul>
            <li>
                <label for="num">Número:</label>
                <input type="number" id="num" name="num" required>
            </li>
        </ul>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>