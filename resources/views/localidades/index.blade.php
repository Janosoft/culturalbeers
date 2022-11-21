@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    <div class="container">
        <ul>
            @foreach ($localidades as $localidad)
                <li>{{ $localidad->nombre }}</li>
            @endforeach
        </ul>
        {{ $localidades->links() }}
    </div>
@endsection