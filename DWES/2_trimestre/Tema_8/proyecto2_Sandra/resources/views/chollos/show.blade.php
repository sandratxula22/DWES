@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $chollo->titulo }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $chollo->descripcion }}</p>
            <p><strong>Categoría:</strong> {{ $chollo->categoria->name }}</p>
            <p><strong>Precio:</strong> ${{ number_format($chollo->precio, 2) }}</p>
            <p><strong>Precio con Descuento:</strong> ${{ number_format($chollo->precio_descuento, 2) }}</p>
            <p><strong>Puntuación:</strong> {{ $chollo->puntuacion }} estrellas</p>
            <p><strong>Enlace:</strong> <a href="{{ $chollo->url }}" target="_blank">{{ $chollo->url }}</a></p>
        </div>
    </div>

    <!-- Botón para regresar al index -->
    <a href="{{ route('chollos.index') }}" class="btn btn-secondary mt-4">Regresar a la Página Principal</a>
</div>
@endsection
