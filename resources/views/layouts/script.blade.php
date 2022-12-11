<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/ui-toasts.js') }}"></script>

<!-- Page JS -->
@yield('script')

<script>
    $(document).ready(function() {

        toastCall();

    });

    function toastCall() {
        if (document.querySelector('#showedToast').value == "true") {
            const toastPlacementExample = document.querySelector('.toast-placement-ex');
            let toastPlacement;
            const selectedType = document.querySelector('#showedToast').getAttribute('class');
            const selectedPlacement = "top-0 end-0".split(' ');
            toastPlacementExample.classList.add(selectedType);
            DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
            toastPlacement = new bootstrap.Toast(toastPlacementExample);
            toastPlacement.show();
        }
    }

    function showToast(value, type){
        document.querySelector('#toastBody').innerHTML = value;
        document.querySelector('#showedToast').className = `bg-${type}`;
        toastCall();
    }
</script>

<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
