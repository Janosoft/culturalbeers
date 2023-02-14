@if (session('statusTitle'))
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container top-0 end-0 p-3">
            <div id="toastStatus" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="bi bi-chat-right-dots-fill me-2 text-{{ session('statusColor') }}"></i><strong class="me-auto">{{ session('statusTitle') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('statusMessage') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        const toastStatus = document.getElementById('toastStatus');
        const toast = new bootstrap.Toast(toastStatus);
        toast.show();
    </script>
@endif