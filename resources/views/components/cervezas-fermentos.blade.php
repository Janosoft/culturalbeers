<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($fermentos as $fermento)
                <x-cervezas-fermento :fermento="$fermento" />
            @empty
                No hay Tipos de Fermentos
            @endforelse
        </div>
    </div>
</div>