# ACTIVIDAD 4

- Diseño de la bbdd
- Creación de Modelos y Migraciones
    * php artisan make:model Nota - m --> Para crear un modelo con una migración asociada 
    * php artisan make:model Nota --> Para crear solo el modelo
    * php artisan make:migration create_notas_table --> Para crear solo la migración
    * php artisan migrate:
        - Ejecutar migraciones
        - Laravel genera estas tablas en la bbdd que configurasre en .env
    * php artisan migrate:status
    * Modificar los modelos y migraciones como sea necesario
- Creación de controladores para manejar la visualización de los cursos, estudiantes e inscripciones
    * php artisan make:controller CursoController
- Crear las vistas para mostrar los datos
    * En resources/views/cursos/index.blade.php --> Una para cada
    * Usamos layout para añadir la navbar que llevara un enlace a cada una de las views de las tablas
- Definir las rutas en routes/web.php
- 