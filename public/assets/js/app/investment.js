
new Vue({
    el: '#transaction',

    data: {
        isloading: false,

        investment: {
            amount: '',
            increment: '',
            description: '',
            email: '',
            trans_type: ''
        },

        
     
        

        route: {
            init_payment: ''
        }
    },

    mounted() {
        this.route.init_payment = $('#initializePayment').val();
    },
   

    methods: {

        percentageIncrement() {
            const val = (20/100) * this.investment.amount + parseInt(this.investment.amount)
            this.investment.increment = this.investment.amount ? 
           parseFloat(val).toFixed(2): '';

         },

       
        initiateTransaction() {
            this.isloading = false;
            axios.post(this.route.init_payment, {
                amount: this.investment.amount,
                name: this.investment.name,
                email: this.investment.email,
                description: this.investment.description,
                trans_type: this.investment.trans_type,
                increment:  this.investment.increment

            }).then((response) => {
                this.isLoading = false;
                $('#makeInvestment').modal('hide');
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