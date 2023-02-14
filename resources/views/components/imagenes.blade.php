<div class="row row-cols-4 mb-3">
    @forelse ($imagenes as $imagen)
        <x-imagen :imagen="$imagen" />
    @empty
        <div class="col">
            No hay Imágenes
        </div>
    @endforelse
</div>
