@if ($fabricacion->trashed())
    <div class="list-group-item list-group-item-action">
        <del>{{ $fabricacion->nombre }}</del>
        <x-botones.accion :route="route('productores_fabricaciones.restore', $fabricacion->fabricacion_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
        <x-botones.accion :route="route('productores_fabricaciones.forcedelete', $fabricacion->fabricacion_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
    </div>
@else
    <a href="{{ route('productores_fabricaciones.show', $fabricacion->slug) }}" class="list-group-item list-group-item-action">
        {{ $fabricacion->nombre }}
    </a>
@endif

