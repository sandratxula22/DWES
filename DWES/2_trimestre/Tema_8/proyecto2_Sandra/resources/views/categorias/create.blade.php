@extends('layouts.app')

@section('title', 'Crear categoría')

@section('content')
<h1>Añadir Categoría</h1>

<form action="{{ route('categorias.insert') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre de la Categoría:</label>
        <input type="text" class="form-control" id="name" name="name">
        @error('name')
            <div class="text-danger">Debes rellenar el nombre</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
@if(session('categ-added'))
    <div class="alert alert-success">{{ session('categ-added')}}</div>
@endif

@endsection