

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

        editUsers: {
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
            create_user: '',
            update_user: '',
            delete_user: '',
            users:''
        }
    },
    mounted() {
        this.route.create = $('#create').val();
        this.route.create_user = $('#create_users').val();
        this.route.update_user = $('#update_users').val();
        this.route.delete_user =$('#delete_users').val();
        // this.route.users = $('#"users').val();
        this.users = $('#all-users').val() ? JSON.parse($('#all-users').val()) : [];
        
    },

    methods: {


        dialog(index){
            this.editUsers = this.users[index]
        },


        allUsers() {
            axios.get(this.route.users).then(response => {
                this.users = response.data.users
            })
        },

        updateUser(){
            this.isloading = false;
            axios.post(this.this.route.update_user, {
                name: this.editUsers.name,
                email: this.editUsers.email,
                nationality: this.editUsers.nationality,
                password: this.editUsers.password,
                mobile: this.editUsers.mobile,
                user_type: this.editUsers.user_type,
                password_confirmation: this.editUsers.password_confirmation
            }).then((response) => {
                this.allUsers();
                $('#Editusers').modal('hide');
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

        deleteUser(id){
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