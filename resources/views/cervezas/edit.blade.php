@extends('layouts.plantilla')
@section('title', 'Editar Cerveza')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('cervezas.update', $cerveza) }}" method="POST">
                @csrf
                @method('put')

                <x-input.text label="Nombre" name="nombre" placeholder="Nombre de la Cerveza" :value="old('nombre', $cerveza->nombre)" />
                <x-input.number label="IBU" name="IBU" min="0" max="100" step="0.5" :value="old('IBU', $cerveza->IBU)" />
                <x-input.number label="ABV" name="ABV" min="0" max="100" step="0.1" :value="old('ABV', $cerveza->ABV)" />                
                <x-input.select label="Productor" name="productor_id" placeholder="Elija el productor de la cerveza" :objects="$productores" :value="old('productor_id', $cerveza->productor_id)" />
                <x-input.select label="Color" name="color_id" placeholder="Elija el color de la cerveza" :objects="$colores" :value="old('color_id', $cerveza->color_id)" />
                <x-input.select label="Estilo" name="estilo_id" placeholder="Elija el estilo de la cerveza" :objects="$estilos" :value="old('estilo_id', $cerveza->estilo_id)" />
                <x-input.check label="Tipo de Envase" name="envases" :objects="$envases_tipos" :value="old('envases', $cerveza->envases->pluck('envase_id'))" />
                {{-- <x-input.image label="Imagen Destacada" name="imagen" :value="old('imagen', $cerveza->imagen)" /> TODO implementar reemplazar imagen--}}
                <x-input.submit label="Guardar" icon="bi bi-hdd-fill" />
            </form>
        </div>
    </div>
@endsection
