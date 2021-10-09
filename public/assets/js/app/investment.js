

new Vue({
    el: '#investment',


    data: {
        isLoading: false,

        investment: {
            amount: '',
            description: '',
            crypto_address: '',
            coin: ''
        },

        withdrawal: {
            amount: '',
            address: '',
            coin: '',
            description: ''
        },

        cryptocurrencies: {
            coin: '',
            price: '',
            currencies: []
        },


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
        console.log('currencies', this.cryptocurrencies.currencies)


    },


    computed: {
        convertedPrice() {
            if (this.selected_coin && this.entered_price) {
                this.cryptocurrencies.currencies[this.selected_coin]
                const value = this.cryptocurrencies.currencies[this.selected_coin]
                this.investment.amount = value.quotes.USD.price * this.entered_price
                console.log('result', this.investment.amount)
                console.log('coin', this.selected_coin.symbol)
                if (this.investment.amount) {
                    const roi_value = (20 / 100) * this.investment.amount + parseInt(this.investment.amount)
                    this.increment = this.investment.amount ? parseFloat(roi_value).toFixed(2) : '';

                }
                return this.investment.amount;

            }
            return 0;

        }

    },

    methods: {

        invest() {
            this.isLoading = true;
            const formData = new FormData();
            formData.append('_token', $('input[name=_token]').val());

            for (let key in this.investment) {
                let value = this.investment[key]
                formData.append(key, value);
            }
            axios.post(this.route.init_payment, formData)
                .then((response) => {
                    $('#Invest').modal('hide');
                    this.investment = {

                    }
                    this.$toastr.Add({
                        msg: response.data.message,
                        clickClose: false,
                        timeout: 2000,
                        position: "toast-top-right",
                        type: "success",
                        preventDuplicates: true,
                        progressbar: false,
                        style: { backgroundColor: "green" }
                    });
                    this.isLoading = false;
                    this.transactions.push(Object.assign({}, response.data.investment, {}));

                }).catch((error) => {
                    this.isLoading = false
                    this.$toastr.Add({
                        msg: error.response.data.message,
                        clickClose: false,
                        timeout: 2000,
                        position: "toast-top-right",
                        type: "error",
                        preventDuplicates: true,
                        progressbar: false,
                        style: { backgroundColor: "red" }
                    });

                })

        },

        withdraw() {
            this.isloading = false;
            axios.post(this.route.withdrawal, {
                amount: this.withdrawal.amount,
                address: this.withdrawal.address,
                coin: this.withdrawal.coin,
                description: this.withdrawal.description
            }).then((response) => {
                this.$toastr.Add({
                    msg: response.data.message,
                    clickClose: false,
                    timeout: 2000,
                    position: "toast-top-right",
                    type: "success",
                    preventDuplicates: true,
                    progressbar: false,
                    style: { backgroundColor: "green" }
                });
                $('#withdraw').modal('hide');

            }).catch((error) => {
                this.isLoading = false
                this.$toastr.Add({
                    msg: error.response.data.message,
                    clickClose: false,
                    timeout: 2000,
                    position: "toast-top-right",
                    type: "error",
                    preventDuplicates: true,
                    progressbar: false,
                    style: { backgroundColor: "red" }
                });

            })

        }
    }
})