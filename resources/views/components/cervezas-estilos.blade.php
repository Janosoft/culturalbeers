<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($estilos as $estilo)
                <x-cervezas-estilo :estilo="$estilo" />
            @empty
                No hay Estilos de Cerveza
            @endforelse
        </div>
    </div>
</div>