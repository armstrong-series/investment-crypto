
new Vue({
    el: '#investment',

    data: {
        isloading: false,

        investment: {
            amount: '', 
            increment: '',
            type: ''
        },

        url: {
            create: ''
        }
    },
    mounted() {
        this.url.create = $('#createInvestment').val();
    },
   

    methods: {

        percentageIncrement() {
            const val = (20/100) * this.investment.amount + parseInt(this.investment.amount)
            this.investment.increment = this.investment.amount ? 
           parseFloat(val).toFixed(2): '';

         },
        invest() {
            this.isloading = false;
            axios.post(this.url.create, {
                amount: this.investment.amount,
                name: this.investment.name
            }).then((response) => {
                this.isLoading = false;
                $('#makeInvestment').modal('hide');
                 this.$toastr.Add({
                    title: response.data.message, 
                    clickClose: false, 
                    timeout: 1000,  
                    position: "toast-top-left", 
                    type: "success",
                    preventDuplicates: true, 
                    
                  }).catch((error) => {
                    console.log(error.response)
                    this.isLoading = false;
                    this.$toastr.Add({
                        title: error.response.data.message, 
                        clickClose: false, 
                        timeout: 1000,  
                        position: "toast-top-left", 
                        type: "error",
                        preventDuplicates: true, 
                        
                      })
                });
            }
            )
        }
    }
})