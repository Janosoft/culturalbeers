@if ($pais->trashed())
    <del>{{ $pais->nombre }}</del>
@else
    <a href="{{ route('paises.show', $pais) }}">{{ $pais->nombre }}</a>
@endif