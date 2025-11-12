@if(session('swal-success'))
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            Swal.mixin({
                theme: document.documentElement.classList.contains('dark') ? 'dark' : '',
            });

            Swal.fire({
                title: "تبریک..!",
                text: "{{ session('swal-success') }}",
                icon: "success",
                theme: document.documentElement.classList.contains('dark') ? 'dark' : '',
            });
        });
    </script>
@endif

