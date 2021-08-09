
new Vue({
    el: '#transactions',


    data: {
        isloading: false,



        transaction_details: [],
        approve_transaction: '',
        disaprove: '',
        address: "",
        clipboard_support: false,

        all_transactions: [],
        route: {
            approve_transaction: "",
            transactions: ""


        }
    },
    mounted() {
        this.transaction_details = $('#allTransactions').val() ? JSON.parse($('#allTransactions').val()) : [];
        this.route.approve_transaction = $('#confirmTransaction').val();
        this.all_transactions =$('#all_transactions').val() ? JSON.parse($('#all_transactions').val()) : [];
        this.route.transactions = $('#transactions').val();

    },
    created() {
        if(navigator.clipboard) {
          this.clipboard_support = true;
        }
      },

    methods: {

        transactions(){
            axios.get(this.route.transactions).then((response) => {
                this.all_transactions = response.data.alltransactions
            })
        },

       async copyAddress(){
            navigator.clipboard.writeText(this.address).then(() => {
            Command: toastr["success"]("Address copied successfully!")
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
            }).catch(e => {
            console.error(e);
            Command: toastr["error"]("Unable to copy Address")
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

        confirmTransaction(tnx_id) {
            console.log('id', tnx_id)
            // axios.post(this.route.approve_transaction, txn_id)
            axios.post(`/transaction/confirmed/${tnx_id}`)
            .then((response) => {
                this.isLoading = false;
                this.transactions();
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

            })
                .catch((error) => {
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

        adminDeleteTransaction(id) {
            console.log(id)
            const notifier = swal({
                title: 'Warning',
                text: `This data will be gone! Are you sure?`,
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
            notifier.then(value => {
                if (value === "delete") {
                    axios.delete(`/delete-transaction/${id}`)
                    .then(response => {
                        this.isloading = false;
                        this.transactions();
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
            })
        },

       
    },

   
});