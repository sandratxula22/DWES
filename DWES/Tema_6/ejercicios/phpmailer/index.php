<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/vendor/autoload.php';

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
    $mail->addAddress('saandruuu22@gmail.com');
    $mail->Subject = 'PHPMailer Gmail';
    $mail->isHTML(true);
    $mail->Body = 'Hola, estoy usando PHPMailer para enviar este mensaje';

    //enviar
    $mail->Send();
    echo 'Se ha enviado el mensaje';
} catch (Exception $e) {
    echo ' Error: ' . $mail->ErrorInfo;
}
?>