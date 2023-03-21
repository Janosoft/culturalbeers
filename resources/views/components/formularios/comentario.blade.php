<form class="form_comentario" action="{{ $route }}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <x-input.comentario label="Nuevo Comentario" name="comentario" :value="old('nombre')" />
        <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="bi bi-chat-fill"></i></button>
    </div>
</form>
