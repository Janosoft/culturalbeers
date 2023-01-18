<hr>
@forelse ($comentarios as $comentario)
    <x-comentario :comentario="$comentario->comentario" :fecha="$comentario->updated_at->format('d/m/Y')" />
@empty
    <div class="row mb-3">
        <div class="col">
            No hay Comentarios
        </div>
    </div>
@endforelse
