<div class="row mb-3">
    <div class="col">
        <div class="list-group">
            @forelse ($paises as $pais)
                <x-pais :pais="$pais" />
            @empty
                No hay Países
            @endforelse
        </div>
    </div>
</div>
