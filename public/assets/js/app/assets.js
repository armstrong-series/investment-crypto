new Vue({
    el: '#assets',


    data: {
        isloading: false,

        assets: {
            niche: '',
            description: '',
            image: ''
        },
        originalFile: '',
        imageFile: null,

        assetsEdit:{
            id: '',
            niche: '',
            description: '',
            image: ''
        },

        route: {
            updateThumbnail: '',
            assets: ''
        }
    },
    mounted() {

    },




    methods: {

        createAssets() {

        },

        showImagePreview(event) {
            this.input = event.target;
            if (this.input.files && this.input.files[0]) {
                // console.log('inputs', this.input.files[0])
                this.originalFile = this.input.files[0]
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageFile = e.target.result;
                };

                reader.readAsDataURL(this.input.files[0]);
            }
        },


        updateThumbnail() {
            this.isLoading = true;
            let formData = new FormData();
            formData.append('id', this.assetsEdit.id);
            formData.append('images', this.originalFile);
            formData.append('_token', $('input[name=_token]').val());

            axios.post(this.route.updateThumbnail, formData)
                .then((response) => {
                    this.isLoading = false;
                    $('#editThumbnailModal').modal('hide');
                    this.assetsEdit.image_path = this.imageFile;

                    const data = response.data
                    console.log(data)
                    Command: toastr["success"](response.data.message)
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }).catch((error) => {
                    console.log(error.response)
                    this.isLoading = false;
                    Command: toastr["error"](error.response.data.message)
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                })
        },

    }
})