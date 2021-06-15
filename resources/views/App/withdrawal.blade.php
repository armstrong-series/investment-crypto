@extends('Layout.master')

@section('title')
    <title>Withdrawal </title>

@endsection
<body>
	<!--wrapper-->
	<div class="wrapper" id="investment">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
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
								<img src="{{ asset('assets/images/e-wallet.png') }}" alt="Crypto Wallet" class="img-responsive img-center">
							</div>
						</div>
                        <hr/>
						 
						<div class="card">
							<div class="card-body">
								<div class="row mb-3">										
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Enter Crypto amount">
									</div>
								</div>	
								<div class="row mb-3">										
									<div class="input-group mb-3">
										<input  type="text" class="form-control"  placeholder="Enter Amount">
										<label class="input-group-text" for="inputGroupSelect02">Amount</label>
									</div>
								</div>	
																
							<div class="row mb-3">
								<button class="btn btn-md" style="background: navy; color:white;">Withdraw</button>
							</div>
							</div>
						</div>
                        <hr/>
					</div>
				</div>
				<!--end row-->
			</div>

		</div>
		<!--end page wrapper -->
	@endsection	


	@section('script')

		
        <script src="{{ asset('assets/js/app/investment.js') }}"></script>
	@endsection
</body>
</html>