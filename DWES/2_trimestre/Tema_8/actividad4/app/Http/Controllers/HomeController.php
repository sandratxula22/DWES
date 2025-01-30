<?php
namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los estudiantes y cursos para mostrarlos en los formularios
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('welcome', compact('estudiantes', 'cursos'));
    }
}
