@if ($estilo->trashed())
    <del>{{ $estilo->nombre }}</del>
@else
    <a href="{{ route('cervezas_estilos.show', $estilo) }}">{{ $estilo->nombre }}</a>
@endif