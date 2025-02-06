# PROYECTO LARAVEL 

## Estructura del Proyecto

- laravel new proyecto2_Sandra
- php artisan serve

## Configuración de la Base de Datos

- Crear los modelos y migraciones:
    * php artisan make:model Categoria -m
    * php artisan make:model Chollo -m
- Definir las migraciones:
    * /database/migrations/...create_categorias_table.php
    * /database/migrations/...create_chollo_table.php
    * string o text
        - string 255 caracteres
        - text 65535 caracteres
    * clave foránea (dos formas) RELACIÓN 1:N
        1. $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade'); --> constrained('categorias) = nombre de la tabla de la que viene
        2. $table->unsignedBigInteger('categoria_id');
        2. $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
    * decimal
        - $table->decimal('precio', 8, 2); --> 8 dígitos en total // 2 decimales // ej: 123456.78
    * boolean
        - $table->boolean('disponible')->default(true); --> Sin default podría ser NULL
- Definir los modelos:
    * /app/Models/Categoria.php
    * /app/Models/Chollo.php
    * Relación de tablas:
        1. Categoria.php:
            - public function chollo(){ --> Tabla con la que relacionamos
            -   return $this->hasMany(Chollo::class, 'categoria_id'); --> Relación 1:N Categorías hasMany Chollos a través de categoria_id (la foreign key)
            - }
        2. Chollo.php:
            - public function categoria(){ --> Tabla con la que relacionamos
            -   return $this->belongsTo(Categoria::class, 'categoria_id'); --> Relación 1:N Chollos belongsTo Categorías a través de categoria_id (la foreign key)
            - }
    * $fillable = []
        - Campos de la bbdd que se pueden asignar en masa, es decir que se pueden usar con create() o update() para insertar o actualizar registros
- Ejecutar las migraciones:
    * php artisan migrate
    * php artisan migrate:status --> para ver que han ido bien
    * php artisan migrate:rollback --> para deshacer la última migración por si ha salido mal
    * php artisan migrate:reset --> para deshacer todas las migraciones
    * php artisan migrate:fresh --> para deshacer todas las migraciones y volver a hacerlas

## Vistas a Implementar

0. Layout:
    - Crear el layout base:
        * /resources/views/layouts/app.blade.php
        * @yield('content') --> IMPORTANTE: donde va a aparecer el contenido después
1. Página principal:
    - Crear el controlador:
        * php artisan make:controller CholloController
        * /app/Http/Controllers/CholloController.php
        * Incluir los modelos: use App\Models\Chollo; & use App\Models\Categoria;
    - Crear la vista principal (tarjetas):
        * /resources/views/chollos/index.blade.php
        * Foreach para recorrer los chollos y mostrarlos en tarjetas
        * Cada tarjeta tiene un botón de editar que redirige al formulario de edición y un botón de borrar que envía una solicitud DELETE para eliminar el chollo:
            - GET (/chollos/{id}/edit): Muestra el formulario de edición.
            - PUT (/chollos/{id}): Procesa los cambios y actualiza el chollo.
            - Métoto edit() en el controlador que carga un formulario buscando por el id del chollo que se va a editar
            - Metodo update()
        * Usamos el método {{ $chollos->links() }} para mostrar los enlaces de paginación
    - Definir rutas:
        * /routes/web.php