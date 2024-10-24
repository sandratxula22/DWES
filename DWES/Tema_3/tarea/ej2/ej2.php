<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            background-color: #4eeaff;
        }

        div {
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.7);
            background-color: rgba(255, 253, 208, 0.9);
            border-radius: 15px;
        }

        form {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>
    <div>
        <h1>Elige el número de tablas</h1>
        <form action="procesar.php" method="post">
            <label for="num">Número: </label>
            <input type="number" id="num" name="num">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>