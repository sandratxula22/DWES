@extends('layouts.app')

@section('content')
    <h1>Listado de Estudiantes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
