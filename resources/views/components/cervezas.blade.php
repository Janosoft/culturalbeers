<div class="row row-cols-3 mb-3">
    @forelse ($cervezas as $cerveza)
        <x-cerveza :nombre="$cerveza->nombre" :productor="$cerveza->productor->nombre" :slug="$cerveza->slug" :src="empty($cerveza->imagen) ? 'https://dummyimage.com/711x400/000000/fff' : Storage::url($cerveza->imagen->url)" />
    @empty
        <div class="col">
            No hay Cervezas
        </div>
    @endforelse
</div>
