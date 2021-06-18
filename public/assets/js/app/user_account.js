
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
            user_type: '',
            mobile: ''
        },

        users: [],

        route: {
            create: '',
            create_user: ''
        }
    },
    mounted() {
        this.route.create = $('#create').val();
        this.route.create_user = $('#create_users').val();
        this.users = $('#all-users').val() ? JSON.parse($('#all-users').val()) : [];
        
    },

    methods: {

        createUser(){
        this.isloading = false;
        axios.post(this.route.create_user, {
            name: this.account.name,
            email: this.account.email,
            nationality: this.account.nationality,
            password: this.account.password,
            mobile: this.account.mobile,
            user_type: this.account.user_type,
            password_confirmation: this.account.password_confirmation
        }).then((response) => {
            $('#users').modal('hide');
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
        },

        createAccount() {
            this.isloading = false;
            axios.post(this.route.create, {
                name: this.account.name,
                email: this.account.email,
                nationality: this.account.nationality,
                password: this.account.password,
                password_confirmation: this.account.password_confirmation
            }).then((response) => {
                this.isLoading = false;
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
                window.location.href = data.url
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
        }
    }
})