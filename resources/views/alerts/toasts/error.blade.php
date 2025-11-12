  @if(session('toast-error'))
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {

            const Toast = Swal.mixin({
                toast: true,
                position: "top-start",
                showConfirmButton: false,
                timer: 6000,
                theme: document.documentElement.classList.contains('dark') ? 'dark' : '',
                timerProgressBar: true,
                // customClass: {
                //     popup: docume nt.documentElement.classList.contains('dark') ? 'sweet-alert-toast dark' : 'sweet-alert-toast'
                // },
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: '{{  session('toast-error') }}',
            });
        })
@endif
