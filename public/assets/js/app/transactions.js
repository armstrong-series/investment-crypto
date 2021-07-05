
new Vue({
    el: '#transactions',

     
    data: {
        isloading: false,

        

        transaction_details: [],

        transactions: {
            isLoading: false,
            approve: '', 
            disaprove: ''

        },
        
        route: {
            approve:""
        }
    },
    mounted() {
        this.transaction_details = $('#allTransactions').val() ? JSON.parse($('#allTransactions').val()) : [];
        this.route.approve = $('#approve').val();
        
    },


    methods: {

        dispproval(){
          
        },
        approve(){  
            // console.log('transactionid',txn_id )
            axios.post(this.route.approve).then((response) => {
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
});