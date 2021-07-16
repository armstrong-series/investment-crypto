
new Vue({
    el: '#transactions',

     
    data: {
        isloading: false,

        

        transaction_details: [],

        transactions: {
            isLoading: false,
            approve_transaction: '', 
            disaprove: ''

        },
        
        route: {
            approve_transaction: ""

        }
    },
    mounted() {
        this.transaction_details = $('#allTransactions').val() ? JSON.parse($('#allTransactions').val()) : [];
        this.route.approve_transaction = $('#approveTransaction').val();
        // console.log(this.route.approve_transaction)
        
    },


    methods: {

        dispproval(){
          
        },
        approveTransaction(txn_id){  
            console.log('txn_id',txn_id)
            axios.post(this.route.approve_transaction, txn_id).then((response) => {
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
      
            }
        },

        adminDeleteTransaction(txn_id){
            console.log(txn_id)
            const notifier = swal({
                title: "Are you sure?",
                text: "Once deleted, this information can't be recovered!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              });
             notifier.then(value =>{
                 if(value === "delete"){
                    axios.delete(`/delete-transaction/${txn_id}`).then(response => {
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
        }
});