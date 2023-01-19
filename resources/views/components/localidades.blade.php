<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($localidades as $localidad)
                <x-localidad :nombre="$localidad->nombre" :slug="$localidad->slug" />
            @empty
                No hay Localidades
            @endforelse
        </div>
    </div>
</div>