<?php

use App\Http\Controllers\OfertasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OfertasController::class, 'index'])->name('ofertas.index');
Route::get('/ofertas', [OfertasController::class, 'index'])->name('ofertas.index');
Route::get('/ofertas/crear', [OfertasController::class, 'crear'])->name('ofertas.crear');
Route::post('/ofertas/insert', [OfertasController::class, 'insert'])->name('ofertas.insert');
Route::get('/ofertas/editar/{id}', [OfertasController::class, 'editar'])->name('ofertas.editar');
Route::put('/ofertas/editar/{id}', [OfertasController::class, 'actualizar'])->name('ofertas.actualizar');
Route::delete('/ofertas/eliminar/{id}', [OfertasController::class, 'destroy'])->name('ofertas.destroy');