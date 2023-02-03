<div class="col mb-3">
    <a href="{{ route('cervezas.show', $slug) }}">
        <div class="card">
            <div class="card-body card_cerveza">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid rounded-circle" loading="lazy" src="{{$src}}" alt="{{ $nombre }}" loading="lazy">
                    </div>
                    <div class="col">
                        {{ $nombre }}
                        <p class="text-muted m-0">{{ $productor }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
