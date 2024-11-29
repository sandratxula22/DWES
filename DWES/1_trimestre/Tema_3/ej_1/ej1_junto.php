<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frutas</title>
</head>
<body>
    <?php 
    if(isset($_GET["enviar"])){ 
        //para comprobar que frutas pasa un valor
        if(isset($_GET["frutas"])){
            if($_GET["frutas"] == "sandia"){
                echo '<img src="https://hortamar.es/wp-content/uploads/sandia-hortamar-1.jpg">';
            }else if($_GET["frutas"] == "manzana"){
                echo '<img src="https://www.recetasnestlecam.com/sites/default/files/2022-04/tipos-de-manzana-royal-gala.jpg">';
            }else if($_GET["frutas"] == "cerezas"){
                echo '<img src="https://blog.nutricionyfarmacia.com/wp-content/uploads/2022/09/cerezas.jpg">';
            }else if($_GET["frutas"] == "pina"){
                echo '<img src="https://www.gob.mx/cms/uploads/image/file/415269/pi_a_1.jpg">';
            }
        }
    }else{ ?>
        <form action="" method="get">
            <legend>Elige tu fruta favorita</legend>
            <input type="radio" name="frutas" id="Sandia" value="sandia" checked>
            <label for="sandia">Sand&iacute;a</label></br>
            <input type="radio" name="frutas" id="Manzana" value="manzana">
            <label for="Manzana">Manzana</label></br>
            <input type="radio" name="frutas" id="Cerezas" value="cerezas">
            <label for="Cerezas">Cerezas</label></br>
            <input type="radio" name="frutas" id="Pina" value="pina">
            <label for="Pina">Pi&ntilde;a</label></br>

            <button input type="submit" value="enviar">Enviar</button>
        </form>
        
    <?php } ?>
</body>
</html>