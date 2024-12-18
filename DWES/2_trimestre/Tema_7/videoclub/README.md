# Proyecto Videoclub

## Descripción
Este es un proyecto de gestión para un videoclub. Permite gestionar productos (cintas, DVDs, juegos) y socios (clientes), realizando operaciones como alquiler y devolución de productos. Además, se incluyen excepciones personalizadas para manejar casos de error, como productos ya alquilados, clientes no encontrados, y exceder el límite de productos alquilados por socio.

## Características
- **Gestión de productos**: Añadir productos (cintas, DVDs, juegos) con precios y características específicas.
- **Gestión de socios**: Añadir socios con un número de productos máximos que pueden alquilar.
- **Alquiler de productos**: Los socios pueden alquilar productos si están disponibles y si no superan el límite de alquileres.
- **Devolución de productos**: Los socios pueden devolver productos alquilados.
- **Manejo de excepciones**: Excepciones personalizadas para manejar errores como productos no encontrados, alquileres duplicados o límite de alquileres excedido.

## Requisitos
Para ejecutar este proyecto, necesitas tener instalado PHP y Composer en tu sistema.

- PHP 7.4 o superior
- Composer para la gestión de dependencias

## Instalación

1. Navega a la carpeta del proyecto

2. Instala las dependencias del proyecto con Composer

3. Asegúrate de que tu servidor web esté configurado para apuntar al directorio donde están los archivos PHP.

## Uso

- El archivo app.php y app2.php realiza pruebas de uso de estas clases y sus métodos, así también como las excepciones.