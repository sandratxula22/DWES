@extends('layouts.app')

@section('title', 'Categorías')

@section('content')


<div class="container">
    <h1 class="mt-4">Listado de Categorías</h1>

    <!-- CREAR CATEGORÍA -->
    <div class="mb-3">
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Crear Categoría</a>
    </div>

    <!-- LISTADO DE CATEGORÍAS -->
    <div class="row">
        @foreach ($categorias as $categoria)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->name }}</h5>
                    <p><strong>Número de chollos asociados:</strong> {{ count($categoria->chollos)}}</p>

                    <!-- BORRAR -->
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Mensaje eliminado -->
    @if(session('categ-eliminada'))
        <div class="alert alert-danger">{{ session('categ-eliminada') }}</div>
    @endif

    <!-- PAGINACIÓN  -->
    <div class="d-flex justify-content-center">
        {{ $categorias->links() }}
    </div>
</div>

@endsection