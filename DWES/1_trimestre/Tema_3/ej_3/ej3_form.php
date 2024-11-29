<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            background-color: #002b36;
        }

        form {
            background-color: #51ff8b;
            max-width: 600px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 14px 20px 8px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea {
            width: 80%;
        }

        #check>input,
        #radio>input {
            width: auto;
        }

        #col,
        #hora {
            width: 69px;
        }

        label,
        legend {
            font-weight: bold;
        }

        #titulo {
            text-align: center;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        li>p {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
    }
    if (isset($_POST["submit"])) {
        $pass = $_POST["passwd"];
    }
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
    }
    ?>
    <form action="ej3_form.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend id="titulo">FORMULARIO</legend>
            <ul>
                <li>
                    <label for="name">Nombre*</label><br>
                    <input type="text" id="name" name="name" value="<?php if (isset($_POST["submit"])) {echo $name; }?>">
                    <?php
                    if (isset($_POST["submit"]) && empty($name)) {
                        echo "<p>Error, introduce un nombre</p>";
                    }
                    ?>
                </li>
                <li>
                    <label for="pass">Contraseña</label><br>
                    <input type="password" id="pass" name="passwd">
                    <?php
                    if (isset($_POST["submit"]) && empty($_POST["passwd"])) {
                        echo "<p>Error, introduce una contraseña</p>";
                    }
                    ?>
                </li>
                <li>
                    <label for="email">E-mail</label><br>
                    <input type="email" id="email" name="email">
                    <?php
                    if (isset($_POST["submit"]) && empty($_POST["email"])) {
                        echo "<p>Error, introduce un email</p>";
                    }
                    ?>
                </li>
                <li>
                    <label for="edad">Edad</label><br>
                    <input type="number" id="edad" name="edad">
                </li>
                <li>
                    <label for="url">URL del instituto</label><br>
                    <input type="url" id="url" name="url">
                </li>
                <li>
                    <label for="fech">Fecha de nacimiento</label><br>
                    <input type="date" id="fech" name="fech">
                </li>
                <li>
                    <label for="texto">Breve descripci&oacute;n personal:</label><br>
                    <textarea placeholder="Utilice este recuadro para escribir" id="texto" name="texto"></textarea>
                </li>
                <li>
                    <label for="file">Archivo</label><br>
                    <input type="file" id="file" name="file">
                </li>
                <li>
                    <label for="col">Color favorito</label><br>
                    <input type="color" id="col" name="col">
                </li>
                <li id="radio">
                    <legend>Elige tu fruta favorita</legend>
                    <input type="radio" name="frutas" id="Sandia" value="Sandia" checked>
                    <label for="sandia">Sand&iacute;a</label></br>
                    <input type="radio" name="frutas" id="Manzana" value="Manzana">
                    <label for="Manzana">Manzana</label></br>
                    <input type="radio" name="frutas" id="Cerezas" value="Cerezas">
                    <label for="Cerezas">Cerezas</label></br>
                </li>
                <li id="check">
                    <legend>¿Qué vehículos tienes?</legend>
                    <input type="checkbox" name="vehiculo[]" id="coche" value="Coche">
                    <label for="coche">Coche</label></br>
                    <input type="checkbox" name="vehiculo[]" id="moto" value="Moto">
                    <label for="moto">Moto</label></br>
                    <input type="checkbox" name="vehiculo[]" id="caravana" value="Caravana">
                    <label for="caravana">Caravana</label></br>
                </li>
                <li>
                    <label for="hora">Hora de entrada</label><br>
                    <input type="time" id="hora" name="hora" value="15:30"><br>
                </li>
                <li>
                    <label for="leng">Elije un lenguaje favorito</label><br>
                    <select id="leng" name="leng">
                        <option value="HTML" selected>HTML</option>
                        <option value="CSS">CSS</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="React">React</option>
                    </select>
                </li>
                <li>
                    <button type="submit" name="submit">Enviar</button>
                </li>
            </ul>
        </fieldset>
    </form>
</body>

</html>