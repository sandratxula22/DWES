<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::all();

        return view('ofertas.index', compact('ofertas'));
    }

    public function crear()
    {
        $empresas = Empresa::all();

        return view('ofertas.crear', compact('empresas'));
    }

    public function insert(Request $request)
    {
        $request -> validate([
            'titulo'=>'required',
            'descripcion'=>'required',
            'salario'=>'required|numeric|min:0',
            'tipo_contrato'=>'required',
            'fecha_cierre'=>'required',
            'empresa_id'=>'required',
        ]);

        $oferta = new Oferta;

        $oferta->titulo = $request->titulo;
        $oferta->descripcion = $request->descripcion;
        $oferta->salario = $request->salario;
        $oferta->tipo_contrato = $request->tipo_contrato;
        $oferta->fecha_cierre = $request->fecha_cierre;
        $oferta->empresa_id = $request->empresa_id;

        $oferta->save();

        return redirect()->route('ofertas.index')->with('success', 'Oferta añadida con éxito');
    }

    public function editar($id)
    {
        $oferta = Oferta::findOrFail($id);
        $empresas = Empresa::all();
        
        return view('ofertas.editar', compact('oferta', 'empresas'));
    }

    public function actualizar(Request $request, $id)
    {
        $request -> validate([
            'titulo'=>'required',
            'descripcion'=>'required',
            'salario'=>'required|numeric|min:0',
            'tipo_contrato'=>'required',
            'fecha_cierre'=>'required',
            'empresa_id'=>'required',
        ]);

        $oferta = Oferta::findOrFail($id);

        $oferta->titulo = $request->titulo;
        $oferta->descripcion = $request->descripcion;
        $oferta->salario = $request->salario;
        $oferta->tipo_contrato = $request->tipo_contrato;
        $oferta->fecha_cierre = $request->fecha_cierre;
        $oferta->empresa_id = $request->empresa_id;
        
        $oferta->save();

        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada con éxito');
    }

    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->delete();

        return redirect()->route('ofertas.index')->with('borrado', 'Oferta eliminada con éxito');
    }
}
