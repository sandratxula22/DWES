<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscripcionController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::get('/inscripciones', [InscripcionController::class, 'index']);
Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('alumnos.store');
Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');