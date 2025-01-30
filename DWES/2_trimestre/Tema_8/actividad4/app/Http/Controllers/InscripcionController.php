<?php
namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    // Mostrar todas las inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Almacenar una nueva inscripción
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inscripcion' => 'required|date',
        ]);

        Inscripcion::create([
            'estudiante_id' => $request->estudiante_id,
            'curso_id' => $request->curso_id,
            'fecha_inscripcion' => $request->fecha_inscripcion,
        ]);

        return redirect('/')->with('success', 'Inscripción realizada correctamente.');
    }
}
