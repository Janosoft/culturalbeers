<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($tipos as $tipo)
                <x-division-politica-tipo :tipo="$tipo" />
            @empty
                No hay Tipos de Divisiones Políticas
            @endforelse
        </div>
    </div>
</div>