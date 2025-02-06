<!-- resources/views/chollos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Chollo</h1>

    <form action="{{ route('chollos.update', $chollo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ $chollo->titulo }}">
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion">{{ $chollo->descripcion }}</textarea>
        </div>

        <div>
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" value="{{ $chollo->precio }}">
        </div>

        <!-- Agrega los demás campos del formulario -->

        <button type="submit">Actualizar</button>
    </form>
@endsection
