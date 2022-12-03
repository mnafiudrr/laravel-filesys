<div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Info</div>
        <small>Just in time</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div id="toastBody" class="toast-body">{{ session('success').session('error') }}</div>
</div>
@if (session('success'))
    <input type="hidden" id="showedToast" class="bg-success" value="{{ session('success')?'true':'false' }}">
@elseif (session('error'))
    <input type="hidden" id="showedToast" class="bg-danger" value="{{ session('error')?'true':'false' }}">
@else
    <input type="hidden" id="showedToast" class="bg-primary" value="false">
@endif