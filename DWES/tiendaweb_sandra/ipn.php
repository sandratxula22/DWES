<?php
// Obtener los datos enviados por PayPal
$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";//URL de sandbox para pruebas
$paypal_email = "tweetertweeter22@gmail.com"; //correo de PayPal

// Paso 1: Obtener los datos de PayPal
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
    $keyval = explode('=', $keyval);
    if (count($keyval) == 2) {
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
}

// Paso 2: Verificar la notificación de PayPal
$req = 'cmd=_notify-validate';
foreach ($myPost as $key => $value) {
    $value = urlencode($value);
    $req .= "&$key=$value";
}

// Paso 3: Enviar la solicitud de verificación a PayPal
$ch = curl_init($paypal_url);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
$response = curl_exec($ch);
curl_close($ch);

// Paso 4: Verificar la respuesta de PayPal
//si está bien pasamos a realizar_pedido
if (strcmp($response, "VERIFIED") == 0) {
    header("Location: realizar_pedido.php");
    exit();
}
?>