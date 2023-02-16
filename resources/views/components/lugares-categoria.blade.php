@if ($categoria->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $categoria->nombre }}</del>
        <x-botones.accion :route="route('lugares_categorias.restore', $categoria->categoria_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('lugares_categorias.forcedelete', $categoria->categoria_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('lugares_categorias.show', $categoria->slug) }}" class="list-group-item list-group-item-action">
        {{ $categoria->nombre }}
    </a>
@endif

