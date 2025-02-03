<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Chollo;

class CholloController extends Controller
{
    public function index()
    {
        $chollos = Chollo::with('categoria')->paginate(10);
        return view('chollos.index', compact('chollos'));
    }
}
