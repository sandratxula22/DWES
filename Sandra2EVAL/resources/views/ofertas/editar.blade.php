@extends('layouts.app')

@section('content')

    <h1>EDITAR OFERTA</h1>
    <form action="{{ route('ofertas.actualizar', $oferta->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" value="{{ $oferta->titulo }}"><br>
        @error('titulo')
            <p style="color: red">El título es obligatorio</p>
        @enderror
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion">{{ $oferta->descripcion}}</textarea><br>
        @error('descripcion')
            <p style="color: red">La descripción es obligatoria</p>
        @enderror
        <label for="salario">Salario:</label><br>
        <input type="number" name="salario" step="0.01" value="{{ $oferta->salario }}"><br>
        @error('salario')
            <p style="color: red">El salario debe ser positivo</p>
        @enderror
        <label for="tipo_contrato">Tipo de contrato:</label><br>
        <input type="text" name="tipo_contrato" value="{{ $oferta->tipo_contrato}}"><br>
        @error('tipo_contrato')
            <p style="color: red">El tipo de contrato es obligatorio</p>
        @enderror
        <label for="fecha_cierre">Fecha de cierre:</label><br>
        <input type="date" name="fecha_cierre" value="{{ $oferta->fecha_cierre}}"><br>
        @error('fecha_cierre')
            <p style="color: red">La fecha de cierre es obligatoria</p>
        @enderror
        <label for="empresa_id">Empresa:</label><br>
        <select name="empresa_id" id="empresa_id">
            <option value="">Selecciona una empresa...</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}" {{$empresa->id == $oferta->empresa_id ? 'selected' : ''}}>{{ $empresa->nombre}}</option>
            @endforeach
        </select><br>
        @error('empresa_id')
            <p style="color: red">La empresa es obligatoria</p>
        @enderror

        <button type="submit">EDITAR</button>
    </form>

@endsection