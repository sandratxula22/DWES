<?php
session_start();

// ... (código para verificar la sesión y el carrito) ...

require 'C:/xampp/htdocs/vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// Configurar las credenciales de la API
$clientId = 'TU_CLIENT_ID'; // Reemplaza con tu Client ID
$clientSecret = 'TU_CLIENT_SECRET'; // Reemplaza con tu Client Secret

$apiContext = new ApiContext(new OAuthTokenCredential($clientId, $clientSecret));
$apiContext->setConfig(
    array(
        'mode' => 'sandbox', // Asegúrate de que esté en modo sandbox
    )
);

// Crear un objeto Payer
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Crear un objeto ItemList y añadir los artículos del carrito
$itemList = new ItemList();
foreach ($_SESSION['carrito'] as $item) {
    $itemObj = new Item();
    $itemObj->setName($item['nombre'])
        ->setCurrency('EUR')
        ->setQuantity($item['cantidad'])
        ->setPrice($item['precio']);
    $itemList->addItem($itemObj);
}

// Calcular el total del pedido
$total = $_POST['total'];

// Crear un objeto Amount
$amount = new Amount();
$amount->setCurrency("EUR")
    ->setTotal($total);

// Crear un objeto Transaction
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Pedido de tienda online")
    ->setInvoiceNumber(uniqid());

// Crear un objeto RedirectUrls
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/daw/DWES/DWES/tiendaweb_sandra/realizar_pedido.php")
    ->setCancelUrl("http://localhost/daw/DWES/DWES/tiendaweb_sandra/home.php");

// Crear un objeto Payment
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

// Ejecutar el pago
try {
    $payment->create($apiContext);

    // Obtener la URL de aprobación de PayPal
    $approvalUrl = $payment->getApprovalLink();

    // Redirigir al usuario a la URL de aprobación
    header("Location: " . $approvalUrl);
    exit();
} catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
} catch (Exception $ex) {
    die($ex);
}
?>