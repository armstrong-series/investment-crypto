@extends('Layout.master')

@section('title')
    <title>Transactions </title>

@endsection
<body>
	<!--wrapper-->
	<div class="wrapper"  id="investment">
   		 @section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper" id="investment">
			<div class="page-content">
				<!--breadcrumb-->
                		
				<!--end row-->
				<h6 class="mb-0 text-uppercase">Transactions</h6>
				<hr/>
				<div v-for="transaction in transactions">
					<div class="card">
						<div class="card-body">
							<!-- <h5 class="mb-0">Tooltips Examples</h5> -->
							
							<div class="row row-cols-auto g-3">
								<div class="col">
									<a v-cloak href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" style="color:navy;" title="Transaction ID">Transaction ID<hr>@{{ transaction.txn_id }}</a>
								</div>
							
								<div class="col">
									<a v-cloak href="javascript:void(0);" role="button" class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coin Address">Coin Address<hr>@{{ transaction.crypto_address }}</a>
								</div>
								<div class="col">
									<button v-cloak type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Date">@{{ transaction.txn_date }}</button>
								</div>

								<div class="col">
									<a href="javascript:void(0);" v-cloak class="text-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="Amount">@{{ transaction.amount }}</a>
								</div>
								<div class="col">                                                                                      
									<button v-cloak type="button" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="left" :title=" transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' ">@{{ transaction.trans_type ==='credit'? 'Deposit' : 'Withdrawal' }}</button>
								</div>

								<div class="col">
									<a href="javascript:void(0);" v-cloak  class="text-secondary"   data-bs-toggle="tooltip" data-bs-placement="left" title="Status"><strong>@{{ transaction.status }}</strong></a>
								</div>
								<div class="col">
									<a href="javascript:void(0);" v-cloak  class="text-secondary"   data-bs-toggle="tooltip" data-bs-placement="left" title="Delete">Remove <i class="fas fa-trash" style="color:red;"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
			<textarea name="" id="allTransactions"  style="display:none;" cols="30" rows="10">{{ json_encode($transaction) }}</textarea>
	</div>
		<!--end page wrapper -->
	@endsection	


	@section('script')	
        <script src="{{ asset('assets/js/app/investment.js') }}"></script>
	@endsection
</body>
</html>