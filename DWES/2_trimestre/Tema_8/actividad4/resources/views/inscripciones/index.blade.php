@extends('layouts.app')

@section('content')
    <h1>Listado de Inscripciones</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>Estudiante</th>
                <th>Fecha de Inscripción</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->id }}</td>
                    <td>{{ $inscripcion->curso->nombre }}</td>
                    <td>{{ $inscripcion->estudiante->nombre }}</td>
                    <td>{{ $inscripcion->fecha_inscripcion }}</td>
                    <td>{{ $inscripcion->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
