# Tienda online con integración de PayPal para pagar

## Descripción

Este proyecto es una tienda online hecha con php que permite a los usuarios navegar por productos, agregarlos a un carrito y realizar pagos a través de PayPal.

## Características

*   Catálogo de categorías.
*   Página  de productos por cada categoría.
*   Carrito de compras.
*   Integración con PayPal (sandbox) para pagos.
*   Registro de los pedidos en la base de datos.
*   Envío de correos electrónicos de confirmación.

## Tecnologías utilizadas

*   XAMPP
*   PHP
*   MySQL
*   HTML
*   CSS
*   PHPMailer
*   PayPal Checkout SDK

## Instalación

1.  Tener un servidor XAMPP funcionando con Apache y MySql
2.  Configurar la base de datos:
    *   Importar el esquema de la base de datos (`sql/tienda.sql`).
    *   Configurar las variables de conexión a la base de datos en `includes/bbdd.php`.
3.  Está configurado con mis credenciales de PayPal para que funcione la API pero si no deberías seguir los siguientes pasos para configurar las credenciales de PayPal:
    *   Crear una aplicación en el entorno de desarrolladores de PayPal.
    *   Obtener las credenciales de API (Client ID y Secret) para el modo Sandbox.
    *   Configurar las credenciales en `paypal_config.php`.
4.  Ejecutar la aplicación: Abrir `index.php` en un navegador web.

## Uso

1.  Utilizar el botón para registrarse que se encuentra en `index.php`:
    *   Crear una cuenta agregando correo, contraseña y dirección.
    *   El correo será preferiblemente un correo real dado que cuando se completa un pedido y se envía un email se recibe en el correo registrado, para comprobar su correcto funcionamiento.
2.  Una vez registrado nos aparece un botón para volver a `index.php` y hacer log in.
3.  Navegar por las categorías en la página principal.
4.  Acceder a cada categoría para visualizar los productos.  
5.  Agregar productos al carrito.
6.  Acceder al carrito para visualizar los productos en él. Desde aquí podemos:
    *   Modificar los productos añadidos.
    *   Proceder al pago con PayPal.
7.  Proceder al pago a través de PayPal:
    *   Si has creado una aplicación en el entorno de desarrolladores de PayPal tendrás unas credenciales de prueba de usuario.
    *   En el caso contrario puedes usar las mías:
        -   usuario: `sb-2x7pv34077906@personal.example.com`
        -   contraseña: `7nh)JZ5x`
    *   Una vez introducidas simulamos el pago y este se registrará en la base de datos y nos redirigira a una página de pedido completado que nos enviará un email.
    *   Si el pago sale mal o salimos antes de acabar nos redirigirá a una página de pedido cancelado.
8.  También podremos navegar por la navbar que nos permite:
    *   Home: ir a la página principal de categorías.
    *   Carrito: consultar el carrito actual.
    *   Cerrar sesión: salir de la sesión actual que nos mostrará una página de cierre de sesión.