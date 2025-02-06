@extends('layouts.app')

@section('title', 'Chollos Destacados')

@section('content')
    <h1>Chollos Destacados</h1>
    <ul class="list-group">
        @foreach($chollos as $chollo)
            <li class="list-group-item">
                <a href="{{ route('chollos.show', $chollo->id) }}">{{ $chollo->titulo }}</a>
                <span class="badge bg-warning">Puntuación: {{ $chollo->puntuacion }}</span>
            </li>
        @endforeach
    </ul>
@endsection
