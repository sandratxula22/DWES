@extends('layouts.app')

@section('content')
    <h2>Listado de ofertas</h2>
    
    @if(session('success'))
        <h3 style="color: green">{{ session('success')}}</h3>
    @endif
    @if(session('borrado'))
        <h3 style="color: red">{{ session('borrado')}}</h3>
    @endif

    <div class="container">
        @foreach($ofertas as $oferta)
            <div style="border: 1px solid black;">
                <h3>Título: {{ $oferta->titulo }}</h3>
                <p>Nombre de la empresa: {{ $oferta->empresas->nombre }}</p>
                <p>Salario: {{ $oferta->salario }}€</p>
                <p>Fecha de cierre: {{ $oferta->fecha_cierre }}</p>

                <a href="{{ route('ofertas.editar', $oferta->id)}} ">EDITAR</a>
                <br><br>
                <form action="{{ route('ofertas.destroy', $oferta->id)}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit">BORRAR</button>
                </form>
                <!-- mensaje si la oferta es anterior a hoy -->
                @if($oferta->fecha_cierre < NOW()->format('Y-m-d'))
                    <p style="color: red">OFERTA EXPIRADA</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection