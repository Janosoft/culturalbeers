@if ($lugar->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $lugar->nombre }}</del>
            <x-botones.accion :route="route('lugares.restore', $lugar->lugar_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('lugares.forcedelete', $lugar->lugar_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth
@else
    <a href="{{ route('lugares.show', $lugar->slug) }}" class="list-group-item list-group-item-action">
        {{ $lugar->nombre }} @if ($lugar->verificado) <i class="bi bi-check-circle-fill text-warning"></i> @endif
    </a>
@endif

