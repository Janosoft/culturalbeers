@extends('layouts.plantilla')
@section('title', 'Mostrar Localidad: ' . $localidad->nombre)

@section('content')
    <div class="content">

        <div class="row">
            <div class="col">
                <h1>{{ $localidad->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('localidades.index') }}"> Volver</a>
                <a href="{{ route('localidades.edit', $localidad) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('localidades.destroy', $localidad) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
