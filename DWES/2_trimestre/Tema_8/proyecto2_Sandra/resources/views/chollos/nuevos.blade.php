@extends('layouts.app')

@section('title', 'Nuevos Chollos')

@section('content')
    <h1>Nuevos Chollos</h1>
    <ul class="list-group">
        @foreach($chollos as $chollo)
            <li class="list-group-item">
                <a href="{{ route('chollos.show', $chollo->id) }}">{{ $chollo->titulo }}</a>
                <span class="badge bg-success">{{ $chollo->created_at->diffForHumans() }}</span>
            </li>
        @endforeach
    </ul>
@endsection