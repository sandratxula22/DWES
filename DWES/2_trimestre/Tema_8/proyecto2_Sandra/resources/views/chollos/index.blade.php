@extends('layouts.app')

@section('content')
<div class="container">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Chollos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Nuevos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Destacados</a></li>
            </ul>
        </div>
    </nav>

    <h1 class="mt-4">Listado de Chollos</h1>

    <!-- LISTADO DE CHOLLOS -->
    <div class="row">
        @foreach ($chollos as $chollo)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $chollo->imagen_url }}" class="card-img-top" alt="{{ $chollo->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $chollo->titulo }}</h5>
                    <p class="card-text">{{ $chollo->descripcion }}</p>
                    <p><strong>Categoría:</strong> {{ $chollo->categoria->name }}</p>

                    {{-- EDITAR Y BORRAR
                    <a href="{{ route('chollos.edit', $chollo->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('chollos.destroy', $chollo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- PAGINACIÓN -->
    <div class="d-flex justify-content-center">
        {{ $chollos->links() }}
    </div>
</div>
@endsection