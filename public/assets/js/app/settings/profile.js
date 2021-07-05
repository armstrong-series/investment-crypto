

new Vue({
    el: '#profile',
    data: {
        isLoading: false,

        imageFile: "",
        showPreview: false,
        imagePreview: '',
        uploadPercentage: 0,

        profile:{
            id: "",
            mobile: "",
            nationality: "",
            name: "",
        },
        users:[],
        profile: [],

        route:{
            profile_update: ""
        }
    },

    mounted() {
        this.route.profile_update = $('#profileUpdate').val();
        this.users = $('#users').val() ? JSON.parse($('#users').val()) : [];
        this.profile = $('#profile').val() ? JSON.parse($('#profile').val()) : [];
        console.log('profile', this.profile)
    },

    methods: {

        updateprofile(){
            this.isloading = false;
            let formData = new FormData();
            formData.append('profile_pics', this.imageFile);
            formData.append('name', this.profile.name);
            formData.append('nationality', this.profile.nationality);
            formData.append('mobile', this.profile.mobile);
            axios.post(this.route.profile_update, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                  }, 
            }).then((response) => {
                this.isloading = false;
                console.log(response)
                const data = response.data
                Command: toastr["info"](response.data.message)
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
                     });
        },

        changeProfilePics() {
            this.imageFile = this.$refs.file.files[0];
            const reader  = new FileReader();
            reader.addEventListener("load", function () {
              this.showPreview = true;
              this.imagePreview = reader.result;
                }.bind(this), false);
            if(this.imageFile){
              if ( /\.(jpe?g|png|gif)$/i.test( this.imageFile.name ) ) {
                    reader.readAsDataURL( this.imageFile);
                }
                
             }
            //  onUploadProgress: function( progressEvent ) {
            //     this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded / progressEvent.total ) * 100 );
            //   }.bind(this)
            
         }   

    }
});