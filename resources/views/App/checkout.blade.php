@extends('Layout.master')

@section('title')
    <title>Checkout</title>

@endsection
<body>
	<!--wrapper-->
	<div class="wrapper" >
    @section('content')
		<!--end header -->
		
			<div class="page-wrapper" id="checkout">
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
                                <h3 class="card-title">Make Payment using the Addresses Below</h3>	
							</div>
							<hr/>
						
							<div class="row">
								<div class="col-lg-8">
									<div class="card">
										<div class="card-body">
											<div class="row mb-3">
												<div class="input-group mb-3">
                                                <input type="text" disabled class="form-control" placeholder="">
													<label class="input-group-text" for="inputGroupSelect02">BTC </label>
												</div>
											</div>
											<div class="row mb-3">										
												<div class="input-group mb-3">
													<input type="text"  disabled class="form-control" placeholder="">
													<label class="input-group-text" for="inputGroupSelect02">ETH </label>
												</div>
											</div>	
											<div class="row mb-3">										
												<div class="input-group mb-3">	
												<input type="text" disabled class="form-control" placeholder="">								
												<label class="input-group-text" for="inputGroupSelect02">BNB</label>
												</div>
											</div>											
											<div class="row mb-3">
												<button  
												class="btn btn-md" style="background: navy; color:white;"><i class="fas fa-donate"></i>Invest</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							 
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
		<!--end page wrapper -->
		
	@endsection	
	</div>

	@section('script')	
		
	@endsection
</body>
</html>