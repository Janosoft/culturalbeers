<form class="form_comentario" action="{{ $route }}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <x-input.textarea label="Nuevo Comentario" name="comentario" rows="1" :value="old('nombre')" />
        <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
    </div>
</form>
