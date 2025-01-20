<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/{nombre}', function ($nombre) {
    return view('index', compact('nombre'));
});

Route::view('datos', 'usuarios', ['id' =>5446]);

Route::get('/api/productos', function () {
    return response()->json([
        ['id' => 1, 'nombre' => 'Manzana', 'precio' => 1.2],
        ['id' => 2, 'nombre' => 'Naranja', 'precio' => 0.8],
        ['id' => 3, 'nombre' => 'Pera', 'precio' => 1.5],
    ]);
});

Route::get('/formulario', function () {
    return view('formulario');
});

Route::post('/procesar', function (Illuminate\Http\Request $request) {
    $nombre = $request->input('nombre');
    return "Formulario procesado. Nombre: $nombre";
});
