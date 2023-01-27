<div class="col mb-3">
    <a href="{{ route('cervezas.show', $slug) }}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid rounded-circle" src="https://dummyimage.com/711x400/000000/fff" alt="{{ $nombre }}" loading="lazy" style="width: 50px;height: 50px;object-fit: cover;">
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
