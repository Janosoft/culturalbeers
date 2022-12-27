@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas.create') }}">Crear Nueva</a>
        <div class="row">
            @foreach ($cervezas as $cerveza)
                <div class="col-lg-4 mb-3">
                    <a href="{{ route('cervezas.show', $cerveza->slug) }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <img class="img-fluid rounded-circle" src="https://dummyimage.com/711x400/000000/fff"
                                            alt="{{ $cerveza->nombre }}" loading="lazy"
                                            style="width: 50px;height: 50px;object-fit: cover;">
                                    </div>
                                    <div class="col">
                                        {{ $cerveza->nombre }}
                                        <p class="text-muted m-0">{{ $cerveza->productor->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $cervezas->links() }}
    </div>
@endsection
