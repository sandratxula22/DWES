<?php
session_start();

// Verificar si el usuario está loggeado y el carrito no está vacío
if (!isset($_SESSION['user']) || empty($_SESSION['carrito'])) {
    header("Location: index.php");
    exit();
}
//usamos la configuración de paypal
require 'paypal_config.php';
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

//solo si se accede por post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = $_POST['total'];
    //para almacenar los items que hay en el carrito
    $items = [];

    foreach ($_SESSION['carrito'] as $producto) {
        $items[] = [
            'name' => $producto['nombre'],
            'unit_amount' => [
                'currency_code' => 'EUR',
                'value' => $producto['precio']
            ],
            'quantity' => $producto['cantidad']
        ];

    }
    //Obtiene una instancia del cliente de PayPal
    $client = PayPalClient::client();
    //Crea una nueva instancia de OrdersCreateRequest
    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = [
        'intent' => 'CAPTURE',
        'purchase_units' => [[
            'amount' => [
                'currency_code' => 'EUR',
                'value' => $total,
                'breakdown' => [
                    'item_total' => [
                        'currency_code' => 'EUR',
                        'value' => $total
                    ]
                ]
            ],
            'items' => $items
        ]],
        //url para si se hace el pago bien o se cancela
        'application_context' => [
            'return_url' => ' ',
            'cancel_url' => 'http://localhost/dwes/tiendaweb_sandra/pago_cancelado.php'
        ]
    ];

    try {
        $response = $client->execute($request);

        //Obtener la URL de aprobación del pago
        foreach ($response->result->links as $link) {
            if ($link->rel === 'approve') {
                header("Location: " . $link->href);
                exit();
            }
        }
    } catch (HttpException $ex) {
        echo $ex->statusCode;
        print_r($ex->getMessage());
    }
}else{
    header("Location: home.php");
    exit();
}
?>