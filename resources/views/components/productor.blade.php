@if ($productor->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $productor->nombre }}</del>
            <x-botones.accion :route="route('productores.restore', $productor->productor_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('productores.forcedelete', $productor->productor_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth
@else
    <a href="{{ route('productores.show', $productor->slug) }}" class="list-group-item list-group-item-action">
        {{ $productor->nombre }} @if ($productor->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif
    </a>
@endif