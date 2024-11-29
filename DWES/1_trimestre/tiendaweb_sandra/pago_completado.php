<?php
//Sandra Pico Álvarez
//Página de éxito para pago de paypal aceptado
//hace el insert en la base de datos

session_start();
// Verificar si el usuario está loggeado y el carrito no está vacío
if (!isset($_SESSION['user'])) { // No necesitas verificar el carrito aquí, ya que se procesó
    // Si no está loggeado, redirigir al login
    header("Location: index.php");
    exit();
}

// Conectar a la base de datos
include('includes/bbdd.php');

//Importar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require 'paypal_config.php';

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
//Verifica si se ha recibido un token de pago en la URL
//verifica si hay una variable order_captured para evitar procesar el mismo pago dos veces
if (isset($_GET['token']) && !isset($_SESSION['order_captured'])) {
    $client = PayPalClient::client();//Obtiene una instancia del cliente de PayPal.
    $request = new OrdersCaptureRequest($_GET['token']);//Crea una solicitud de captura de orden con el token de pago.
    $request->prefer('return=representation');//Indica que se prefiere una respuesta completa de la API.

    try {
        //Envía la solicitud de captura a la API de PayPal.
        $response = $client->execute($request);

        //Procesar el pedido en la base de datos
        $total = $_SESSION['total'];
        $id_restaurante = $_SESSION['id_restaurante'];
        $fecha_pedido = date("Y-m-d");

        //Insertar el pedido en la tabla 'pedidos'
        $sql_pedido = "INSERT INTO pedidos(id_restaurante, fecha_pedido, total) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql_pedido);
        $stmt->bind_param("isd", $id_restaurante, $fecha_pedido, $total);
        $stmt->execute();

        //Obtener el ID del pedido generado
        $id_pedido = $conn->insert_id;

        //Insertar cada producto en la tabla 'pedido_detallado'
        foreach ($_SESSION['carrito'] as $item) {
            $id_producto = $item['id_producto'];
            $cantidad = $item['cantidad'];
            $precio = $item['precio'];

            $sql_producto = "INSERT INTO pedido_detallado(id_pedido, id_producto, cantidad, precio_unitario) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_producto);
            $stmt->bind_param("iiid", $id_pedido, $id_producto, $cantidad, $precio);
            $stmt->execute();

            // Actualizar el stock del producto
            $sql_stock = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";
            $stmt = $conn->prepare($sql_stock);
            $stmt->bind_param("ii", $cantidad, $id_producto);
            $stmt->execute();
        }

        // Marcar la orden como capturada para que no se ejecute de nuevo
        $_SESSION['order_captured'] = true;

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
            <?php include('includes/navbar.php'); ?>
            <div class="exito">Pedido realizado con éxito. Se enviará un correo de confirmación a: <?php echo $_SESSION['user']; ?></div>
            <?php include('includes/footer.php'); ?>

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


            //limpiar el carrito y el total después de hacer el pedido
            unset($_SESSION['carrito']);
            unset($_SESSION['total']);

            //Limpiar la variable order_captured
            unset($_SESSION['order_captured']); 

            ?>
        </body>

        </html>
<?php

    } catch (HttpException $ex) {
        echo $ex->statusCode;
        print_r($ex->getMessage());
    }
} else {
    //La orden ya ha sido capturada o no hay token, redirige a la página principal
    header("Location: home.php");
    exit();
}
?>