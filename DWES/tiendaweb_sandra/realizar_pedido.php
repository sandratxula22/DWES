<?php
//Sandra Pico Álvarez
//Página de realizar pedido

session_start();
// Verificar si el usuario está loggeado y el carrito no está vacío
if (!isset($_SESSION['user']) || empty($_SESSION['carrito'])) {
    // Si no está loggeado, redirigir al login
    header("Location: index.php");
    exit();
}

// Conectar a la base de datos
include('includes/bbdd.php');

//Importar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    //si el pago de paypal ha sido correcto
    if (isset($_POST['submit'])) {
        $total = $_SESSION['total'];
        $id_restaurante = $_SESSION['id_restaurante'];
        $fecha_pedido = date("Y-m-d");

        //insert a pedidos
        $sql_pedido = "INSERT INTO pedidos(id_restaurante, fecha_pedido, total) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql_pedido);
        $stmt->bind_param("isd", $id_restaurante, $fecha_pedido, $total);
        $stmt->execute();
        //sacar el id que se ha generado en este pedido
        $id_pedido = $conn->insert_id;

        //Insertar cada producto en la tabla de detalles
        foreach ($_SESSION['carrito'] as $item) {
            $id_producto = $item['id_producto'];
            $cantidad = $item['cantidad'];
            $precio = $item['precio'];

            //insert en pedido_detallado
            $sql_producto = "INSERT INTO pedido_detallado(id_pedido, id_producto, cantidad, precio_unitario) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_producto);
            $stmt->bind_param("iiid", $id_pedido, $id_producto, $cantidad, $precio);
            $stmt->execute();

            //actualizar el stock del producto
            $sql_stock = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";
            $stmt = $conn->prepare($sql_stock);
            $stmt->bind_param("ii", $cantidad, $id_producto);
            $stmt->execute();
        }


        include('includes/navbar.php');
    ?>
        <div class="exito">Pedido realizado con éxito. Se enviará un correo de confirmación a: <?php echo $_SESSION['user']; ?></div>
    <?php
        //PHPMailer enviar correo
        $mail = new PHPMailer(true);
        try {
            //PHPMailer
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //SMTP
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'sandra.picalv.1@iesjulianmarias.es';
            $mail->Password = 'dgzy cqpx kjxm aeyf';

            //email
            $mail->setFrom('sandra.picalv.1@iesjulianmarias.es', 'Sandra');
            $mail->addAddress($_SESSION['user']);
            $mail->Subject = 'Pedido realizado';
            $mail->isHTML(true);
            $descripcion = '<h3>Detalles de su pedido:</h3><ul>';
            foreach ($_SESSION['carrito'] as $item) {
                $descripcion .= "<li>Producto: {$item['nombre']}, Cantidad: {$item['cantidad']}, Precio Unitario: {$item['precio']} €</li>";
            }
            $descripcion .= "</ul><p>Total: {$total} €</p>";
            $mail->Body = 'Ha realizado su pedido correctamente.' . $descripcion;

            //enviar
            $mail->Send();
        } catch (Exception $e) {
            echo ' Error: ' . $mail->ErrorInfo;
        }

        //limpiar el carrito después de hacer el pedido
        unset($_SESSION['carrito']);
    } else {
        //si intentas acceder sin submit
        header("Location: home.php");
        exit();
    }
    ?>
</body>

</html>