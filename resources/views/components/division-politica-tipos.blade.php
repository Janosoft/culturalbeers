<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($divisiones as $divisiones_politicas_tipo)
                <x-division-politica-tipo :nombre="$divisiones_politicas_tipo->nombre" :slug="$divisiones_politicas_tipo->slug" />
            @empty
                No hay Tipos de Divisiones Políticas
            @endforelse
        </div>
    </div>
</div>