<?php

use App\Http\Controllers\CholloController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CholloController::class, 'index']); //Página principal
