

new Vue({
    el: '#profile',
    data: {
        isLoading: false,

        imageFile: "",
        showPreview: false,
        imagePreview: '',
        uploadPercentage: 0,

        user:{
            id: "",
            mobile: "",
            nationality: "",
            password: "",
            password_confirmation: "",
            name: ""
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
            this.isloading = true;
            let formData = new FormData();
            formData.append('profile_pics', this.imageFile);
            formData.append('name', this.user.name);
            formData.append('nationality', this.user.nationality);
            formData.append('password', this.user.password);
            formData.append('password_confirmation', this.user.password_confirmation);
            formData.append('mobile', this.profile.mobile);
            axios.post(this.route.profile_update, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                  }, 
            }).then((response) => {
                this.isloading = false;
                console.log(response)
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
            
         }   

    }
});