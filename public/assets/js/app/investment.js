
new Vue({
    el: '#investment',

    data: {
        isloading: false,

        investment: {
            amount: '',
            description: '',
            email: '',
            trans_type: ''
        },

        cryptocurrencies: {
            coin: '',
            price: '',
            currencies: []
        },

        withdrawal: {
            amount: '',
            
        },

        selected_coin: '',
        entered_price: '',
        price: '',
        increment: '',
        
        route: {
            init_payment: ''
        }
    },

    mounted() {
        this.route.init_payment = $('#initializePayment').val();
        this.cryptocurrencies.currencies = JSON.parse($('#currencies').val())
        console.log('currencies', this.cryptocurrencies.currencies)
    },

    computed: {
        convertedPrice() {
            if (this.selected_coin && this.entered_price) {
                this.cryptocurrencies.currencies[this.selected_coin]
                const value = this.cryptocurrencies.currencies[this.selected_coin]
                this.investment.amount = value.quotes.USD.price * this.entered_price
                console.log('result', this.investment.amount)
                if(this.investment.amount){
                    const roi_value = (20 / 100) * this.investment.amount + parseInt(this.investment.amount)
                    this.increment = this.investment.amount ?  parseFloat(roi_value).toFixed(2) : '';
                   
                }
                return this.investment.amount;
                
            }
            return 0;

        }

        // convertedPrice() {
        //     if (this.selected_coin && this.entered_price) {
        //         this.cryptocurrencies.currencies[this.selected_coin]
        //         const value = this.cryptocurrencies.currencies[this.selected_coin]
        //         const result = value.quotes.USD.price * this.entered_price
        //         return result;

        //         console.log('value', value)
        //         console.log('selected_coin', this.selected_coin)
        //         console.log('price', this.entered_price)
        //     }
        //     return 0;

        // }
    },


    methods: {

        // percentageIncrement() {
        //     const val = (20 / 100) * this.investment.amount + parseInt(this.investment.amount)
        //     this.investment.increment = this.investment.amount ?
        //         parseFloat(val).toFixed(2) : '';

        // },
       
       


        initiateTransaction() {
            this.isloading = false;
            axios.post(this.route.init_payment, {
                amount: this.investment.amount,
                name: this.investment.name,
                email: this.investment.email,
                description: this.investment.description,
                trans_type: this.investment.trans_type,
                increment: this.increment

            }).then((response) => {
                this.isLoading = false;
                // $('#makeInvestment').modal('hide');
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