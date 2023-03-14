@if ($pais->trashed())
    @auth
        <div class="list-group-item list-group-item-action">
            <del>{{ $pais->nombre }}</del>
            <x-botones.accion :route="route('paises.restore', $pais->pais_id)" title="Restaurar" color="btn-light" icon="bi bi-recycle" />
            <x-botones.accion :route="route('paises.forcedelete', $pais->pais_id)" title="Eliminar Permanentemente" color="btn-light" icon="bi bi-trash" />
        </div>
    @endauth    
@else
    <a href="{{ route('paises.show', $pais->slug) }}" class="list-group-item list-group-item-action">
        {{ $pais->nombre }}
    </a>
@endif

