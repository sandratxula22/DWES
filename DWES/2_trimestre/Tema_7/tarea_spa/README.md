# Proyecto SPA - Gestión de Libros y Reseñas

Este proyecto es una aplicación web de una sola página (SPA) para gestionar libros y reseñas. Los usuarios pueden iniciar sesión, ver un catálogo de libros, leer los detalles de cada libro y dejar sus propias reseñas.

## Instalación

### Requisitos previos  
1. Tener un servidor web con soporte PHP y MySQL (como XAMPP, WAMP o LAMP).  
2. Una base de datos MySQL configurada con las tablas necesarias.

## Funcionalidades

### 1. **Inicio de sesión**  
Los usuarios pueden iniciar sesión con su correo electrónico y contraseña.

### 2. **Catálogo de Libros**  
Una vez autenticado, el usuario puede acceder al catálogo de libros. Cada libro está listado con su título, autor, categoría, y puntuación promedio. Los usuarios pueden hacer clic en un libro para ver sus detalles y reseñas.

### 3. **Detalles del Libro**  
Muestra los detalles completos de un libro, como título, autor y categoría. Los usuarios pueden ver todas las reseñas de otros usuarios. Los usuarios autenticados pueden dejar su propia reseña, indicando puntuación y comentario.

### 4. **Último Libro Visitado**  
El nombre del último libro visitado se guarda en el `sessionStorage` y se muestra debajo del catálogo de libros. Esta información se borra cuando el usuario cierra sesión.

### 5. **Cierre de sesión**  
Los usuarios pueden cerrar sesión y serán redirigidos a la página de inicio de sesión. Toda la información relacionada con la sesión se elimina del `sessionStorage`.