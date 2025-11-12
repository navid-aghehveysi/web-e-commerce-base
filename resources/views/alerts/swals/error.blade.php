@if(session('swal-error'))
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "خطا..!",
                text: "{{ session('swal-error') }}",
                icon: "error"
            });
        })
    </script>
@endif
