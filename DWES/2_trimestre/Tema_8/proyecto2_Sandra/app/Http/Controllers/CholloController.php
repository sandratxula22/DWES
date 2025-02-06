<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Chollo;

class CholloController extends Controller
{
    //página princial con paginación
    public function index()
    {
        $chollos = Chollo::with('categoria')->paginate(9);
        return view('chollos.index', compact('chollos'));
    }

    //devolver el formulario con el chollo elegido
    public function edit($id)
    {
        //obtener el chollo por su ID y todas sus categorías
        $chollo = Chollo::findOrFail($id);
        $categorias = Categoria::all();

        return view('chollos.edit', compact('chollo', 'categorias'));
    }

    //devolver la vista del chollo específico
    public function show($id)
    {
        $chollo = Chollo::findOrFail($id);

        return view('chollos.show', compact('chollo'));
    }

    //función para actualizar el chollo
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'puntuacion' => 'required|numeric|min:1|max:5',
            'precio' => 'required|numeric',
            'precio_descuento' => 'required|numeric',
            'url' => 'required',
        ]);

        $chollo = Chollo::findOrFail($id);

        $chollo->titulo = $request->titulo;
        $chollo->descripcion = $request->descripcion;
        $chollo->categoria_id = $request->categoria_id;
        $chollo->puntuacion = $request->puntuacion;
        $chollo->precio = $request->precio;
        $chollo->precio_descuento = $request->precio_descuento;
        $chollo->url = $request->url;
        $chollo->disponible = true;

        $chollo->save();

        return redirect()->route('chollos.index')->with('success', 'Chollo actualizado con éxito.');
    }

    //función para eliminar un chollo
    public function destroy($id)
    {
        $chollo = Chollo::findOrFail($id);
        $chollo->delete();

        return back()->with('eliminado', 'Chollo eliminado');
    }

    //función para mostrar el formulario de creación de un chollo
    public function create()
    {
        $categorias = Categoria::all();

        return view('chollos.create', compact('categorias'));
    }

    //función para insertar un chollo
    public function insert(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'puntuacion' => 'required|numeric|min:1|max:5',
            'precio' => 'required|numeric',
            'precio_descuento' => 'required|numeric',
            'url' => 'required',
        ]);

        $chollo = new Chollo;

        $chollo->titulo = $request->titulo;
        $chollo->descripcion = $request->descripcion;
        $chollo->categoria_id = $request->categoria_id;
        $chollo->puntuacion = $request->puntuacion;
        $chollo->precio = $request->precio;
        $chollo->precio_descuento = $request->precio_descuento;
        $chollo->url = $request->url;
        $chollo->disponible = true;

        $chollo->save();

        return redirect()->route('chollos.index')->with('success', 'Chollo creado con éxito.');
    }

    //obtener los chollos ordenados por los más recientes
    public function nuevos()
    {
        $chollos = Chollo::orderBy('created_at', 'desc')->take(10)->get();
        return view('chollos.nuevos', compact('chollos'));
    }

    //obtener los chollos con mejor puntuación
    public function destacados()
    {
        $chollos = Chollo::orderBy('puntuacion', 'desc')->take(10)->get();
        return view('chollos.destacados', compact('chollos'));
    }
}
