<form class="form_comentario" action="{{$action}}" method="POST">
    @csrf

    <div class="input-group mb-3">
        <textarea class="form-control" name="comentario" id="comentario" rows="1" placeholder="Nuevo Comentario">{{ old('comentario') }}</textarea>
        <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
    </div>
</form>