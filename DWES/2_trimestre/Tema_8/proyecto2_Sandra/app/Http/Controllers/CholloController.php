<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Chollo;

class CholloController extends Controller
{
    public function index()
    {

        $chollos = Chollo::with('categoria')->paginate(9);
        return view('chollos.index', compact('chollos'));
    }

    public function edit($id)
    {
        // Obtener el chollo por su ID
        $chollo = Chollo::findOrFail($id);

        // Retornar la vista de edición con el chollo encontrado
        return view('chollos.edit', compact('chollo'));
    }

    public function show($id)
    {
        // Obtener el chollo por su ID
        $chollo = Chollo::findOrFail($id);

        // Retornar la vista de edición con el chollo encontrado
        return view('chollos.show', compact('chollo'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            // Agrega otras validaciones si es necesario
        ]);

        // Obtener el chollo por su ID
        $chollo = Chollo::findOrFail($id);

        // Actualizar los campos del chollo con los nuevos valores
        $chollo->titulo = $request->titulo;
        $chollo->descripcion = $request->descripcion;
        $chollo->precio = $request->precio;
        // Actualiza otros campos según sea necesario

        // Guardar los cambios
        $chollo->save();

        // Redirigir a la lista de chollos con un mensaje de éxito
        return redirect()->route('chollos.index')->with('success', 'Chollo actualizado con éxito.');
    }

    public function destroy($id)
    {
        $chollo = Chollo::findOrFail($id);
        $chollo->delete();

        return back()->with('eliminado', 'Chollo eliminado');
    }

    
    public function create()
    {
        // Obtener todas las categorías para mostrarlas en el formulario
        $categorias = Categoria::all();

        return view('chollos.creat', compact('categorias'));
    }
}
