<?php

use App\Http\Controllers\CholloController;
use Illuminate\Support\Facades\Route;

//Página principal
Route::get('/', [CholloController::class, 'index'])->name('chollos.index');
//Página con form para editar
Route::get('/chollos/edit/{id}', [CholloController::class, 'edit'])->name('chollos.edit');
//Solicitud put para hacer update en la bbdd
Route::put('/chollos/{id}', [CholloController::class, 'update'])->name('chollos.update');
//Solicitud delete para borrar un registro de la bbdd
Route::delete('/chollos/{id}', [CholloController::class, 'destroy'])->name('chollos.destroy');
//Página donde se muestra un chollo
Route::get('/chollos/{id}', [CholloController::class, 'show'])->name('chollos.show');
//Página con form para crear
Route::get('/chollos/create', [CholloController::class, 'create'])->name('chollos.create');