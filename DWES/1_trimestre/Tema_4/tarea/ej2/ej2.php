<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        table{
            border-collapse: collapse;
            border: 2px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid black;
        }
        th{
            background-color: rgb(102,178,255);
            color: white;
        }
    </style>
</head>
<body>
    <h1>IMPRIMIR ARRAY</h1>
    <?php
    function imprimir_array($array){
        $html = "<table>
                    <tr>
                        <th>POSICIÓN</th>
                        <th>ELEMENTO</th>
                    </tr>";

        //Por cada elemento del array imprimimos una columna con el índice y otra con el contenido
        for($i=0;$i<count($array);$i++){
            $html .= "<tr>
                        <td>".$i."</td>
                        <td>".$array[$i]."</td>
                    </tr>";
        }
        $html .= "</table>";
        return $html;
    }

    $array_tabla = ["Perro", "Gato", "Elefante", "León", "Mapache"];
    echo imprimir_array($array_tabla);
    ?>
</body>
</html>