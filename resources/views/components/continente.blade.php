@if ($continente->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $continente->nombre }}</del>
            <x-botones.accion :route="route('continentes.restore', $continente->continente_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('continentes.forcedelete', $continente->continente_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth    
@else
    <a href="{{ route('continentes.show', $continente->slug) }}" class="list-group-item list-group-item-action">
        {{ $continente->nombre }}
    </a>
@endif