@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Envase: ' . $cervezas_envase_tipo->nombre)

@section('content')
    <div class="content">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_envase_tipo->nombre }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('cervezas_envases_tipos.index') }}"> Volver</a>
                <a href="{{ route('cervezas_envases_tipos.edit', $cervezas_envase_tipo) }}" class="btn btn-primary">
                    Editar</a>
                <form action="{{ route('cervezas_envases_tipos.destroy', $cervezas_envase_tipo) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
