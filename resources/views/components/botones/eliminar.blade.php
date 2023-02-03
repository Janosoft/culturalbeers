<form class="form_destroy" action="{{ $route }}" method="POST">
    @csrf
    @method('delete')
    
    <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
</form>
