const { default: axios } = require("axios");

new Vue({
    el: '#assets',


    data: {
        isLoading: false,

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
            assets: '',
            update_assets: ''
        }
    },
    mounted() {
        this.route.assets = $('#createMarktAssets').val();
        this.route.update_assets = $('#updateAssets').val();
        this.all_assets = $('#all_assets').val() ? JSON.parse($('#all_assets').val()) : [];
       
    },




    methods: {

      

        createAssets() {
            this.isLoading = true;

            let formData = new FormData();
            formData.append('image', this.originalFile);
            formData.append('niche', this.assets.niche);
            formData.append('description', this.assets.description);
            axios.post(this.route.assets, formData, {
                headers: {'Content-Type': 'multipart/form-data'},
            }).then((response) => {
                this.$toastr.Add({
                    msg: response.data.message, 
                    clickClose: false, 
                    timeout: 2000,
                    position: "toast-top-right", 
                    type: "success", 
                    preventDuplicates: true, 
                    progressbar: false,
                    style: {backgroundColor: "green"}
                  });
                  $('#bannerModal').modal('hide');
                    window.location = '/asset'
                
                }).catch((error) => {
                this.isLoading = false
                this.$toastr.Add({
                    msg: error.response.data.message, 
                    clickClose: false, 
                    timeout: 2000,
                    position: "toast-top-right", 
                    type: "error", 
                    preventDuplicates: true,
                    progressbar: false, 
                    style: { backgroundColor: "red"}
                  });
            
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

      
        removeThumbnail(id){
            console.log(id)
            const notifier = swal({
                title: 'Warning',
                text: `This Image will be permanently gone! Are you sure?`,
                icon: 'warning',
                closeOnClickOutside: false,
                buttons: {
                    cancel: {
                        text: "cancel",
                        visible: true,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Confirm",
                        value: 'delete',
                        visible: true,
                        className: "btn-danger",
                    }
                }
            });
             notifier.then(value =>{
                 if(value === "delete"){
                    this.isLoading = true;
                    axios.delete(`/delete-thumbnail/${id}`)
                    .then((response) => {
                        this.$toastr.Add({
                            msg: response.data.message, 
                            clickClose: false, 
                            timeout: 2000,
                            position: "toast-top-right", 
                            type: "success", 
                            preventDuplicates: true, 
                            progressbar: false,
                            style: {backgroundColor: "green"}
                          });
                        }).catch((error) => {
                        console.log(error.response)
                        this.isLoading = false;
                         this.$toastr.Add({
                            msg: error.response.data.message, 
                            clickClose: false, 
                            timeout: 2000,
                            position: "toast-top-right", 
                            type: "error", 
                            preventDuplicates: true,
                            progressbar: false, 
                            style: { backgroundColor: "red"}
                          });
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

        editAssets(index) {
            const asset = this.all_asset[index]
            this.assetsEdit = {
                ...this.assetsEdit,
                id: asset.id,
                niche: asset.niche,
                description: asset.description
            }

        },

        updateAsset(){
            this.isLoading = true;
            axios.post(this.route.update_assets,{
                id: this.assetsEdit.id,
                niche: this.assetsEdit.niche,
                description: this.assetsEdit.description
            })  .then((response) => {
                this.$toastr.Add({
                    msg: response.data.message, 
                    clickClose: false, 
                    timeout: 2000,
                    position: "toast-top-right", 
                    type: "success", 
                    preventDuplicates: true, 
                    progressbar: false,
                    style: {backgroundColor: "green"}
                  });
                //   $('#editThumbnailModal').modal('hide'); 
                }).catch((error) => {
                console.log(error.response)
                this.isLoading = false;
                 this.$toastr.Add({
                    msg: error.response.data.message, 
                    clickClose: false, 
                    timeout: 2000,
                    position: "toast-top-right", 
                    type: "error", 
                    preventDuplicates: true,
                    progressbar: false, 
                    style: { backgroundColor: "red"}
                  });
            });
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