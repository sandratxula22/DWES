<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #002b36;
        }

        table {
            max-width: 600px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 18px;
            border-spacing: 0;
            background-color: #51ff8b;
        }

        h1 {
            text-align: center;
            color: white;
        }

        td {
            border: 2px solid #333;
            padding: 10px;
            min-width: 180px;
        }
        td:first-child{
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['vehiculo']) && !empty($_POST['vehiculo'])) {
        $vehiculos = implode(", ", $_POST['vehiculo']);
    } else {
        $vehiculos = "No tiene vehículos.";
    }

    if (isset($_FILES['file']) && !empty($_POST['file'])) {
        $archivo = $_FILES['file']['name'];
    } else {
        $archivo = 'No se ha seleccionado ningún archivo.';
    }
    ?>

    <table border="2">
        <h1>DATOS DEL FORMULARIO</h1>
        <tr>
            <td>Nombre:</td>
            <td><?php echo ($_POST['name']); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo ($_POST['email']); ?></td>
        </tr>
        <tr>
            <td>Edad:</td>
            <td><?php echo ($_POST['edad']); ?></td>
        </tr>
        <tr>
            <td>URL del instituto:</td>
            <td><?php echo ($_POST['url']); ?></td>
        </tr>
        <tr>
            <td>Fecha de nacimiento:</td>
            <td><?php echo ($_POST['fech']); ?></td>
        </tr>
        <tr>
            <td>Descripción:</td>
            <td><?php echo ($_POST['texto']); ?></td>
        </tr>
        <tr>
            <td>Archivo elegido:</td>
            <td><?php echo $archivo; ?></td>
        </tr>
        <tr>
            <td>Color favorito:</td>
            <td><?php echo ($_POST['col']); ?></td>
        </tr>
        <tr>
            <td>Fruta favorita:</td>
            <td><?php echo ($_POST['frutas']); ?></td>
        </tr>
        <tr>
            <td>Vehículos:</td>
            <td><?php echo $vehiculos; ?></td>
        </tr>
        <tr>
            <td>Hora de entrada:</td>
            <td><?php echo ($_POST['hora']); ?></td>
        </tr>
        <tr>
            <td>Lenguaje favorito:</td>
            <td><?php echo ($_POST['leng']); ?></td>
        </tr>
    </table>
</body>

</html>