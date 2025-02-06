<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Chollo;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function create()
{
    // Obtener todas las categorías desde el controlador de categorías
    $categorias = Categoria::all();  // o redirigir a CategoriaController si prefieres hacerlo allí

    return view('chollos.create', compact('categorias'));
}
}
