@if ($color->trashed())
    <del>{{ $color->nombre }}</del>
@else
    <a href="{{ route('cervezas_colores.show', $color) }}">{{ $color->nombre }}</a>
@endif
