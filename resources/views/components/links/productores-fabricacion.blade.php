@if ($fabricacion->trashed())
    <del>{{ $fabricacion->nombre }}</del>
@else
    <a href="{{ route('productores_fabricaciones.show', $fabricacion) }}">{{ $fabricacion->nombre }}</a>
@endif