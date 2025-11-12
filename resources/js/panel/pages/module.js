document.addEventListener('alpine:init', () => {
    Alpine.store('moduleFieldController' ,  {
        visible: false,
        syncField(value) {
            this.visible = !!parseInt(value)
        }
    })
});
