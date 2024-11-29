# Proceso de PayPal para pagar y envío de email con PHPMailer

## Explicación

1. carrito.png
	*   Estado del carrito a la hora de hacer el pedido.
2. iniciosesion_paypal.png
	*   Al hacer click en "hacer pedido" en el carrito nos redirigirá a PayPal, inicialmente nos pide las credenciales (se incluyen en el archivo README.md inicial del proyecto).
3. paypal.png
	*   Una vez iniciamos sesión veremos esta pantalla de PayPal para pagar.
4. pago_cancelado.php
	*   Si salimos del pago antes de realizarlo correctamente veremos esta pantalla de pago cancelado, el carrito sigue estando ahí, no se borra ni se inserta en la base de datos.
5. pago_completado.php
	*   Si hacemos click en continuar se pagará el pedido correctamente y nos redirigirá a este apartado donde vemos que el pedido se ha realizado correctamente y se nos habrá enviado un email gracias a PHPMailer.
6. pedidos.png
    *   Si el pedido se paga correctamente se realizará y eso quiere decir que se insertará en la base de datos. Este pedido es el último que aparece en esta tabla (id = 5), podemos comprobar que el total coincide.
7. pedido_detallado.png
    *   Una vez se guarda el pedido, también se debe guardar el desglose del pedido en una tabla aparte, como se ve en la imagen se han guardado correctamente los productos del pedido con id = 5.
8. phpmailer.png
    *   Además de insertar el pedido en la base de datos al completar el pago se tiene que enviar un email gracias a PHPMailer. En la captura vemos que se envía el correo con los datos del pedido correctamente.
9. phpmailer2.png
    *   Detalles de envío del correo con PHPMailer.
