@if (session('statusTitle'))
    <div class="alert alert-{{ session('statusColor') }} alert-dismissible fade show" role="alert">
        <strong>{{ session('statusTitle') }}</strong> {{ session('statusMessage') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif