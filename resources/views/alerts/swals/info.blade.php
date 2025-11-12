@if(session('swal-info'))
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: "اطلاع رسانی..!",
                text: "{{ session('swal-info') }}",
                icon: "info"
            });
        })
    </script>
@endif
