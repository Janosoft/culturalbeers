<form class="form_destroy" action="{{ $route }}" method="POST">
    @csrf
    @method('delete')
    
    <button type="submit" class="btn btn-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
</form>
