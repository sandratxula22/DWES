@extends('layouts.app')

@section('title', 'Editar chollo')

@section('content')
    <h1>Editar Chollo</h1>

    <form action="{{ route('chollos.update', $chollo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Chollo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $chollo->titulo }}" >
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" >{{ $chollo->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control" >
                <option value="">Seleccionar Categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $chollo->categoria_id ? 'selected' : ''}}>{{ $categoria->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <input type="number" name="puntuacion" id="puntuacion" class="form-control" value="{{ $chollo->puntuacion }}" min="1" max="5" >
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{$chollo->precio }}" step="0.01" >
        </div>

        <div class="mb-3">
            <label for="precio_descuento" class="form-label">Precio con Descuento</label>
            <input type="number" name="precio_descuento" id="precio_descuento" class="form-control" value="{{ $chollo->precio_descuento }}" step="0.01" >
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Enlace al Chollo</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $chollo->url }}" >
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
