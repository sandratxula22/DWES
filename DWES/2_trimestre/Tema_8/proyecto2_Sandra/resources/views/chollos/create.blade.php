@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Nuevo Chollo</h1>

    <form method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Chollo</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <input type="number" name="puntuacion" id="puntuacion" class="form-control" value="{{ old('puntuacion') }}" min="1" max="5" required>
            @error('puntuacion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" step="0.01" required>
            @error('precio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio_descuento" class="form-label">Precio con Descuento</label>
            <input type="number" name="precio_descuento" id="precio_descuento" class="form-control" value="{{ old('precio_descuento') }}" step="0.01" required>
            @error('precio_descuento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Enlace al Chollo</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ old('url') }}" required>
            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Chollo</button>
    </form>

    <a href="{{ route('chollos.index') }}" class="btn btn-secondary mt-3">Volver al Listado</a>
</div>
@endsection
