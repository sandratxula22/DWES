@extends('layouts.app')

@section('content')
    <h1>Listado de Cursos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Fecha de Creación</th>
        </tr>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->descripcion }}</td>
                <td>{{ $curso->precio }}</td>
                <td>{{ $curso->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection
