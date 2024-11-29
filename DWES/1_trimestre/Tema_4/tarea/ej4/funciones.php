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
<?php
//ej1
function calcular_media($array){
    //calculo la suma de los números del array con array_sum()
    $suma = array_sum($array);
    //calculo la media con la suma y el número de elementos del array que se calcula con count()
    $media = $suma/count($array);
    return "Números: ".implode(", ", $array)."<br>La media es: ".$suma."/".count($array)." = ".$media;
}
//ej2
function imprimir_array($array){
    $html = "<table>
                <tr>
                    <th>POSICIÓN</th>
                    <th>ELEMENTO</th>
                </tr>";
    for($i=0;$i<count($array);$i++){
        $html .= "<tr>
                    <td>".$i."</td>
                    <td>".$array[$i]."</td>
                </tr>";
    }
    $html .= "</table>";
    return $html;
}
//ej3
function tablas_multiplicar($inicio, $fin){
    $res = "";
    for($i=$inicio;$i<=$fin;$i++){
        for($j=0;$j<=10;$j++){
            $res .= "$i * $j = ".$i*$j."<br>";
        }
        $res .= "<br>";
    }

    return $res;
}

?>
