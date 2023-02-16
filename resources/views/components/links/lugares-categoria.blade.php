@if ($categoria->trashed())
    <del>{{ $categoria->nombre }}</del>
@else
    <a href="{{ route('lugares_categorias.show', $categoria) }}">{{ $categoria->nombre }}</a>
@endif