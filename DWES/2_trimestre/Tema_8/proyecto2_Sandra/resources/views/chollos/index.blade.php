@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <h1 class="mt-4">Listado de Chollos</h1>

    <!-- LISTADO DE CHOLLOS -->
    <div class="row">
        @foreach ($chollos as $chollo)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('chollos.show', $chollo->id) }}">
                        <h5 class="card-title">{{ $chollo->titulo }}</h5>
                    </a>
                    <p class="card-text">{{ $chollo->descripcion }}</p>
                    <p><strong>Categoría:</strong> {{ $chollo->categoria->name }}</p>

                    <!-- EDITAR Y BORRAR -->
                    <a href="{{ route('chollos.edit', $chollo->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('chollos.destroy', $chollo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Mensaje editado -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Mensaje eliminado -->
    @if(session('eliminado'))
        <div class="alert alert-danger">{{ session('eliminado') }}</div>
    @endif

    <!-- PAGINACIÓN  -->
    <div class="d-flex justify-content-center">
        {{ $chollos->links() }}
    </div>
</div>
@endsection