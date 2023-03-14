@if ($familia->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $familia->nombre }}</del>
            <x-botones.accion :route="route('cervezas_familias.restore', $familia->familia_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('cervezas_familias.forcedelete', $familia->familia_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth    
@else
    <a href="{{ route('cervezas_familias.show', $familia->slug) }}" class="list-group-item list-group-item-action">
        {{ $familia->nombre }}
    </a>
@endif
