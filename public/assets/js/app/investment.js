const { default: axios } = require("axios");

new Vue({
    el: '#investment',

     
    data: {
        isloading: false,

        investment: {
            amount: '',
            description: '',
            address: '',
            coin: ''
        },

        withdrawal: {
            amount: '', 
            address: '',
            coin: '',
           description:''
        },

        cryptocurrencies: {
            coin: '',
            price: '',
            currencies: []
        },

        preferred_coin: '',
        
        selected_currency: '',
        
        transactions: [],
        loader: true,

        selected_coin: '',
        entered_price: '',
        price: '',
        increment: '',
        
        route: {
            init_payment: '',
            withdrawal: ''
        }
    },
    mounted() {
        this.transactions = $('#allTransactions').val() ? JSON.parse($('#allTransactions').val()) : [];
        this.route.init_payment = $('#initializePayment').val();
        this.route.withdrawal = $('#withdrawal').val();
        this.cryptocurrencies.currencies = JSON.parse($('#currencies').val())
        // console.log('currencies', this.cryptocurrencies.currencies)
        this.preferred_coin = 
        this.cryptocurrencies.currencies.filter((coin) => ['BTC', 'ETH', 'BNB', 'USDT'].includes(coin.symbol))
        console.log('coin', this.preferred_coin)

        
        setTimeout(function(){
            console.log('welcome')
            this.loader = false;
       }, 3000);

        
    },



    computed: {
        convertedPrice() {
            if (this.selected_coin.id && this.entered_price) {
                this.cryptocurrencies.currencies[this.selected_coin.id]
                const value = this.cryptocurrencies.currencies[this.selected_coin.id]
                this.investment.amount = value.quotes.USD.price * this.entered_price
                console.log('result', this.investment.amount)
                if(this.investment.amount){
                    const roi_value = (20 / 100) * this.investment.amount + parseInt(this.investment.amount)
                    this.increment = this.investment.amount ?  parseFloat(roi_value).toFixed(2) : '';
                   
                }
                return this.investment.amount;
                
            }
            return 0;

        },


    },

    methods: {
      
        initiateTransaction() {
            this.isloading = false;
            axios.post(this.route.init_payment, {
                amount: this.investment.amount,
                name: this.investment.name,
                email: this.investment.email,
                description: this.investment.description,
                increment: this.increment
            }).then((response) => {
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

        },

        withdraw(){
            this.isloading = false;
            axios.post(this.route.withdrawal, {
                amount: this.withdrawal.amount,
                address: this.withdrawal.address,
                coin: this.withdrawal.coin,
                description: this.withdrawal.description
            }).then((response) => {
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