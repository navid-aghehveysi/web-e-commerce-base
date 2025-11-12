
export default function ChangeStatus(initialStatus) {
    return {
        checked: !!parseInt(initialStatus),
        message: '',
        async toggle(url) {
            try {
                const response = await axios.get(url)
                this.checked = response.data.checked;

                this.message = response.data.checked
                    ? response.data.toast?.active ?? 'رکورد مورد نظر با موفقیت فعال شد'
                    : response.data.toast?.inActive ?? 'رکورد مورد نظر با موفقیت ازغیر فعال شد';

                Swal.fire({
                    toast: true,
                    position: "top-start",
                    icon: "success",
                    title: this.message,
                    showConfirmButton: false,
                    timer: 4500,
                    customClass: {
                        popup: document.documentElement.classList.contains('dark')
                            ? 'sweet-alert-toast dark'
                            : 'sweet-alert-toast'
                    }
                });

            }
            catch (error) {
                console.error(error)
            }
        }
    }
}
