<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($paises as $pais)
                <x-pais :nombre="$pais->nombre" :slug="$pais->slug" />
            @empty
                No hay Países
            @endforelse
        </div>
    </div>
</div>