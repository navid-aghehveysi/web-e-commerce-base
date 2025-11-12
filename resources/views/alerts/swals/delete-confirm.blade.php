
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
           let className = '{{ $className }}'
           // const elm = $('.' + className);
           const elm = document.querySelector('.' + className);

           elm.on('click' , function (e) {
               // جلو گیری از ارسال فرم
               e.preventDefault();

               // استایل دادن به مدالی که برای تایید حذف نمایش داده میشود.
               const swalButtons = Swal.mixin({
                   customClass: {
                       confirmButton: "btn btn-success",
                       cancelButton: "btn btn-danger mx-2",
                   },
                   theme: document.documentElement.classList.contains('dark') ? 'dark' : '',
                   buttonsStyling: false
               });

               // محتوای مدال تاییدیه
               swalButtons.fire({
                   title: "آیا از حذف این رکورد مطمئن هستید؟",
                   text: "شما می توانید درخواست خود را لغو کنید..!",
                   icon: "warning",
                   showCancelButton: true,
                   confirmButtonText: "بله رکورد حذف شود.",
                   cancelButtonText: "خیر درخواست لغو شود",
                   reverseButtons: true
               }).then((result) => {
                   if (result.value === true) {
                       // $(this).parent().submit();
                       this.parentElement.submit();

                   }
                   else if(result.dismiss === Swal.DismissReason.cancel) {
                       swalButtons.fire({
                           title: "لغو درخواست",
                           text: "درخواست شما با موفقیت لغو گردید",
                           icon: "error",
                           confirmButtonText: 'سپاسگزار'
                       });
                   }

               });
           })
       })
    </script>


