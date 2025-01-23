<?php

use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/proyecto/{id?}', function ($id = 1) {
    return view('proyecto', ['id' => $id]);
});
