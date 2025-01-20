<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
</head>
<body>
    <h1>Enviar un formulario</h1>
    <form action="/procesar" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
