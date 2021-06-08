
new Vue({
    el: '#auth',

    data: {
        isloading: false,

        account: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            nationality: '',
            phone_number: ''
        },

        url: {
            create: ''
        }
    },
    mounted() {
        this.url.create = $('#create').val();
   
        this.$toastr.defaultPosition = "toast-top-right";
         this.$toastr.s(
            "This Message From Toastr Plugin\n You can access this plugin : <font color='yellow'>this.$toastr</font>"
          );
    },

    methods: {
        createAccount() {
            this.isloading = false;
            axios.post(this.url.create, {
                name: this.account.name,
                email: this.account.email,
                nationality: this.account.nationality,
                password: this.account.password,
                password_confirmation: this.account.password_confirmation
            }).then((response) => {
                this.isLoading = false;
                const data = response.data
                window.location.href = data.url,
                // this.$toastr.defaultPosition = "toast-top-right";
                this.$toastr.s(
                    response.data.message
                    ).catch((error) => {
                    console.log(error.response)
                    this.isLoading = false;
                    this.$toastr.defaultPosition = "toast-top-right";
                    this.$toastr.e(
                         error.response.data.message
                         )
                    });
                 })
        }
    }
})