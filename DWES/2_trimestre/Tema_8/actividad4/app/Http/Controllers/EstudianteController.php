<?php
namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Mostrar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Guardar un nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'email' => 'required|email|unique:estudiantes,email',
        ]);

        Estudiante::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
        ]);

        return redirect('/')->with('success', 'Estudiante agregado correctamente.');
    }
}
