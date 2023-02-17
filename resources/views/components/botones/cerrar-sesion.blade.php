<form action="{{ $route }}" method="POST">
    @csrf
    
    <x-input.submit label="Cerrar Sesión" icon="bi bi-box-arrow-left" value="Logout" />
</form>