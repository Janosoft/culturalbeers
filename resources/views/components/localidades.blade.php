<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($localidades as $localidad)
                <x-localidad :localidad="$localidad" />
            @empty
                No hay Localidades
            @endforelse
        </div>
    </div>
</div>