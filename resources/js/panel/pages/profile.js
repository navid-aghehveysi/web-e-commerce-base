
document.addEventListener('alpine:init', () => {

    Alpine.store('imagePreview' , {
        imgURL: '',

        upload(image) {
            this.imgURL = URL.createObjectURL(image)

        }
    })
});
