@extends('Layout.master')

@section('title')
    <title>Cryptocurrency Wallet</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}" />
@endsection
<body>
	<!--wrapper-->
	<div class="wrapper">
    @section('content')
		<!--end header -->
	
			<div class="page-wrapper" id="investment">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					</div>
					<!--end breadcrumb-->
					<!-- <div  v-if="loader" class="row" id="center-block">
						<img  style="opacity:80%; width:400px; height:250px;" src="{{ asset('assets/images/Ethereum-3.gif')}}" alt="loader" class="rounded mx-auto d-block">	
					</div> -->
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
								<div class="card">
									<div class="card-body">
									<div class="col-lg-4" style="float:right;">
										<div class="card">
											<div class="card-body">
											<h5 class="mb-0 text-primary text-center font-weight-bold">Balance</h5>
										
										</div>
										<div class="progress mt-3" style="height:7px;">
											<div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
											<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
											<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<div class="mt-3"></div>
										<div class="d-flex align-items-center">
											<div class="flex-grow-1 ms-2">
												<h3 class="mb-0 text-secondary font-weight-bold">{{ $account_balance }} BTC</h3>
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
								
									<div class="col-lg-6">											
							
										<div class="row mb-3">
											<button  data-bs-toggle="modal" data-bs-target="#withdraw"  style="color:white; box-shadow: 4px 3px 4px grey;"
											class="btn btn-md btn-secondary"><i class="bx bxs-wallet" style="color:white;"></i>Withdraw</button>	
										</div>
									</div>
								
							

								<!-- <div class="col-lg-5">										
									<div class="row mb-3">
										<button  data-bs-toggle="modal" data-bs-target="#invest" style="color:white; box-shadow: 4px 3px 4px grey;"
										class="btn btn-md btn-success"><i class="bx bxs-wallet" style="color:white;"></i>Invest</button>	
									</div>								
								</div> -->
								</div>
								  <!-- Modal -->
								  <div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-body">
												<div class="row mb-3">
													<div class="input-group mb-3">-
														<select class="form-select" v-model="selected_coin">
															<option value="" disabled>Choose</option>
															<option v-for="(currency, key) in cryptocurrencies.currencies" v-bind:value="key">@{{ currency.name }}</option>					
														</select>
														<label class="input-group-text" for="inputGroupSelect02">Coin</label>
													</div>
												</div>
												<div class="row mb-3">										
													<div class="input-group mb-3">
														<input  type="text" class="form-control"  v-model="entered_price" placeholder=" Enter Amount">
														<label class="input-group-text" for="inputGroupSelect02">Amount</label>
													</div>
												</div>
												<div class="row mb-3">										
													<div class="input-group mb-3">
														<input v-if="selected_coin" v-model="investment.crypto_address" type="text" class="form-control"  :placeholder="'Enter your '+selected_coin.name +' Address'">
														<label v-if="selected_coin" class="input-group-text" for="inputGroupSelect02">Address</label>
													</div>
												</div>
												<div class="row mb-3">										
													<div class="input-group mb-3">
													
														<input  @keyup="convertedPrice()"  v-bind:value="convertedPrice" type="text" class="form-control"  disabled placeholder="USD Equivalent">	
														<label class="input-group-text" for="inputGroupSelect02">USD</label>
													</div>
												</div>
												<div class="row mb-3">										
													<div class="input-group mb-3">
														<input v-model="increment" type="text" class="form-control" disabled placeholder=" 20%  Increment">
														<label class="input-group-text" for="inputGroupSelect02">ROI</label>
													</div>
												</div>
												<div class="row mb-3">										
													<div class="input-group mb-3">
														<input v-model="investment.description"  type="text" class="form-control" placeholder="Enter Transaction Narration">

													</div>
												</div>	
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button  type="button" v-on:click="invest()" class="btn btn-primary btn-md">Proceed</button>
											</div>
											</div>
										</div>
                           		 </div>
							  <!--Withdraw  Modal -->
							  <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
										<div class="row mb-3">
											<div class="input-group mb-3">-
												<select class="form-select" v-model="selected_coin">
													<option value="" disabled>Choose</option>
													<option v-for="(currency, key) in cryptocurrencies.currencies" v-bind:value="key">@{{ currency.name }}</option>					
												</select>
												<label class="input-group-text" for="inputGroupSelect02">Coin</label>
											</div>
										</div>
										<div class="row mb-3">										
											<div class="input-group mb-3">
												<input  type="text" class="form-control"  v-model="withdrawal.amount" placeholder=" Enter Amount">
												<label class="input-group-text" for="inputGroupSelect02">Amount</label>
											</div>
										</div>
										<div class="row mb-3">										
											<div class="input-group mb-3">	
												<input v-if="selected_coin" v-model="withdrawal.address" type="text" class="form-control"  :placeholder="'Enter ' +selected_coin.name +' Address'">
												<label v-if="selected_coin" class="input-group-text" for="inputGroupSelect02">Address</label>
											</div>
										</div>	
										<div class="row mb-3">										
											<div class="input-group mb-3">
												<input  type="text" class="form-control"  placeholder=" Enter Narration ">
												<label class="input-group-text" for="inputGroupSelect02">Narration</label>
											</div>
										</div>
                                    </div>
                                    <div class="modal-footer">
                                   		 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button  type="button" @click="withdraw()" class="btn btn-primary btn-md">Proceed</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /End modal -->
						</div>
						
					</div>
					<!--end row-->
				</div>
			
				<textarea name=""  id="initializePayment" style="display:none;" id="" cols="30" rows="10">{{ route('users.invest') }}</textarea>
				<textarea name=""  id="withdrawal" style="display:none;" id="" cols="30" rows="10">{{ route('users.withdrawal') }}</textarea>
				<textarea name=""  id="currencies" style="display:none;" id="" cols="30" rows="10">{{ json_encode($currencies) }}</textarea>
	
			</div>
		<!--end page wrapper -->
		
	@endsection	
	</div>

	@section('script')	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="{{ asset('assets/js/app/investment.js') }}"></script>
	@endsection
</body>
</html>