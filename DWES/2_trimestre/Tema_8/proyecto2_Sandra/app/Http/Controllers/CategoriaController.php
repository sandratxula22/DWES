<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(6);
        return view('categorias.index', compact('categorias'));
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return back()->with('categ-eliminada', 'Categoría eliminada');
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function insert(Request $request)
    {
        $request -> validate([
            'name'=>'required',
        ]);

        $categoria = new Categoria;

        $categoria->name = $request->name;

        $categoria->save();

        return back()->with('categ-added', 'Categoría añadida');
    }
}
