@if ($localidad->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $localidad->nombre }}</del>
            <x-botones.accion :route="route('localidades.restore', $localidad->localidad_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('localidades.forcedelete', $localidad->localidad_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth
@else
    <a href="{{ route('localidades.show', $localidad->slug) }}" class="list-group-item list-group-item-action">
        {{ $localidad->nombre }}
    </a>
@endif
