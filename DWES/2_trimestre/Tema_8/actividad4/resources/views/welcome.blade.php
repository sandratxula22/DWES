@extends('layouts.app')

@section('content')
    <h1>Bienvenido al Sistema de Gestión de Cursos</h1>
    <p>Desde aquí puedes gestionar cursos, estudiantes e inscripciones.</p>

    <!-- Formulario para insertar un alumno -->
    <h3>Agregar Alumno</h3>
    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Alumno</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Alumno</button>
    </form>

    <!-- Formulario para agregar una inscripción -->
    <h3>Inscribir Alumno a un Curso</h3>
    <form action="{{ route('inscripciones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="estudiante_id">Selecciona al Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="curso_id">Selecciona un Curso</label>
            <select name="curso_id" id="curso_id" class="form-control" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha_inscripcion">Fecha de Inscripción</label>
            <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
        </div>
        <button type="submit" class="btn btn-success">Inscribir Alumno</button>
    </form>
@endsection
