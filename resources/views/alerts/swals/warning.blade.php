@if(session('swal-warning'))
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "هشدار..!",
                text: "{{ session('swal-warning') }}",
                icon: "warning"
            });
        })
    </script>
@endif
