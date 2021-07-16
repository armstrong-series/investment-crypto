
new Vue({
    el: '#assets',


    data: {
        isloading: false,

        assets: {
            niche: '',
            description: '',

        },
        originalFile: '',
        imageFile: null,
        input: null,
        isImageUploading: false,

        assetsEdit: {
            id: '',
            niche: '',
            description: '',
            image: ''
        },

        all_assets: [],

        route: {
            updateThumbnail: '',
            assets: ''
        }
    },
    mounted() {
        this.route.assets = $('#createMarktAssets').val();
        this.all_assets = $('#all_assets').val() ? JSON.parse($('#all_assets').val()) : [];
       
    },




    methods: {

        createAssets() {
            this.isLoading = false;

            let formData = new FormData();
            formData.append('image', this.originalFile);
            formData.append('niche', this.assets.niche);
            formData.append('description', this.assets.description);
            axios.post(this.route.assets, formData, {
                headers: {'Content-Type': 'multipart/form-data'},
            }).then((response) => {
                this.isLoading = false;
                $('#bannerModal').modal('hide');
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
                //  $('#bannerModal').modal('hide');

                 

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


        showImagePreview(event) {
            this.input = event.target;
            if (this.input.files && this.input.files[0]) {
                console.log('inputs', this.input.files[0])
                this.originalFile = this.input.files[0]
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.imageFile = e.target.result;
                };

                reader.readAsDataURL(this.input.files[0]);
            }
        },

      
        removeAsset(id){
            console.log(id)
            const notifier = swal({
                title: "Are you sure?",
                text: "Once deleted, this file can't be recovered!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              });
             notifier.then(value =>{
                 if(value === "delete"){
                    axios.delete(`/delete-user/${id}`).then(response => {
                        this.isloading = false;
                        const data = response.data
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
                        Command: toastr["info"](error.response.data.message)
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
                    });
                 }
             })
          
        },

        

        clearImage() {
            this.imageFile = null;
            this.input = null;
        },


        editThumbnail(asset){
            this.assetsEdit = asset;
            this.imageFile = asset.image_path;
        },
        
        updateThumbnail() {
            this.isLoading = true;
            let formData = new FormData();
            formData.append('id', this.assetsEdit.id);
            formData.append('image', this.originalFile);
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