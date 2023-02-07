<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($envases as $envase)
                <x-cervezas-envases-tipo :envase="$envase" />
            @empty
                No hay Tipos de Envase
            @endforelse
        </div>
    </div>
</div>