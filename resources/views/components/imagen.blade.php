<div class="col">
    <a href="{{ route('imagenes.show', $imagen) }}">
        <img class="img-fluid" loading="lazy" src="{{Storage::url($imagen->url)}}">
    </a>
</div>