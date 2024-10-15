<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<table border='2'><tr>";
    for($i=1;$i<=100;$i++){
        if($i % 2 == 0){
            echo "<td>$i</td>";
        }
    }
    echo "</tr></table>"
    ?>
</body>
</html>