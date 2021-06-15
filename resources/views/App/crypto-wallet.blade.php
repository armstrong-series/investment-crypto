@extends('Layout.master')

@section('title')
    <title>Cryptocurrency Wallet</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
<body>
	<!--wrapper-->
	<div class="wrapper" id="investment">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div id="transaction">
			<div class="page-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						
					</div>
					<!--end breadcrumb-->
					<div class="row">
						<div class="col-xl-9 mx-auto">
							<h6 class="mb-0"></h6>
							<hr/>
							<div class="card">
								<div class="card-body">
									<img src="{{ asset('assets/images/wallet.png') }}"
									alt="Crypto Wallet" class="img-responsive img-center">
								</div>
							</div>
							<hr/>
							
						
							<div class="row">
								<div class="col-lg-4">
									<div class="card">
										<div class="card-body">
										<h5 class="mb-0 text-primary text-center font-weight-bold">Balance</h5>
									
									</p>
									<div class="progress mt-3" style="height:7px;">
										<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="mt-3"></div>
									<div class="d-flex align-items-center">
										<div class="flex-grow-1 ms-2">
											<h3 class="mb-0 text-secondary font-weight-bold">1,756 USD</h3>
										</div>	
									</div>
									<div class="progress mt-3" style="height:7px;">
										<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
										<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
											<hr class="my-4" />	
										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="card">
										<div class="card-body">
											<div class="row mb-3">
												<div class="input-group mb-3">
													<select class="form-select" v-model="selected_coin">
														<option value="">Choose</option>
															<option v-for="(currency, key) in cryptocurrencies.currencies"
															v-bind:value="key">@{{ currency.name }}
															</option>
						
													
													</select>
													<label class="input-group-text" for="inputGroupSelect02">Coin</label>
												</div>
											</div>
											<div class="row mb-3">										
												<div class="input-group mb-3">
													<input type="text" v-model="entered_price" class="form-control" placeholder="Enter Crypto amount">
												</div>
											</div>	
											<div class="row mb-3">										
												<div class="input-group mb-3">
													<input  v-bind:value="convertedPrice" type="text" class="form-control"  disabled placeholder="USD Equivalent">
													<!-- <input @keyup="percentageIncrement()"  v-model="investment.amount" type="text" class="form-control"  placeholder="USD Equivalent"> -->
													<label class="input-group-text" for="inputGroupSelect02">USD</label>
												</div>
											</div>	
											<div class="row mb-3">										
												<div class="input-group mb-3">
													<textarea name="" id="" v-model="investment.description" cols="30" rows="5" placeholder="Enter Transaction Description" class="form-control"></textarea>
												</div>
											</div>	
											
											<div class="row mb-3">										
												<div class="input-group mb-3">
													<input v-model="investment.increment" type="text" class="form-control"  placeholder=" 20% Monthly Increment in USD">
													<label class="input-group-text" for="inputGroupSelect02">ROI</label>
												</div>
											</div>									
											<div class="row mb-3">
												<button v-on:click="initiateTransaction()" class="btn btn-md" style="background: navy; color:white;">Pay</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--end row-->
				</div>
				<textarea name=""  id="initializePayment" style="display:none;" id="" cols="30" rows="10">{{ route('make-payment') }}</textarea>
				<textarea name=""  id="currencies" style="display:none;" id="" cols="30" rows="10">{{ json_encode($currencies) }}</textarea>
			</div>
		<!--end page wrapper -->
		</div>
	@endsection	


	@section('script')	

	<script>
		new Vue ({

			el: '#investment',
			data: {
				cryptocurrencies: {
				coin: '', 
				price: '',
				currencies: []
        	 },  

			 selected_coin: '',
			 entered_price: '',
			 price: ''
			},


			mounted(){
				this.cryptocurrencies.currencies = JSON.parse($('#currencies').val())
				console.log('currencies', this.cryptocurrencies.currencies)
			}, 

			computed:{
				convertedPrice(){
					if(this.selected_coin  && this.entered_price){
						this.cryptocurrencies.currencies[this.selected_coin]
						const value = this.cryptocurrencies.currencies[this.selected_coin]
						 const result = value.quotes.USD.price * this.entered_price
						 return result;

						console.log('value', value)
						console.log('selected_coin', this.selected_coin)
						console.log('price', this.entered_price)
						
					}
					return 0;
					
				}
			}


		})
	</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ asset('assets/js/app/investment.js') }}"></script>
	@endsection
</body>
</html>