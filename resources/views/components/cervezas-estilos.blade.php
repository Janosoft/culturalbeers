<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($estilos as $estilo)
                <x-cervezas-estilo :nombre="$estilo->nombre" :slug="$estilo->slug" />
            @empty
                No hay Estilos de Cerveza
            @endforelse
        </div>
    </div>
</div>