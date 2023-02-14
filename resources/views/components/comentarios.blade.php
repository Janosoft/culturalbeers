<hr>
@forelse ($comentarios as $comentario)
    <x-comentario :comentario="$comentario" />
@empty
    <div class="row mb-3">
        <div class="col">
            No hay Comentarios
        </div>
    </div>
@endforelse
