<div class="row row-cols-4 mb-3">
    @forelse ($imagenes as $imagen)
        <x-imagen :src="Storage::url($imagen->url)" />
            @empty
        <div class="col">
            No hay Imágenes
        </div>
    @endforelse
</div>