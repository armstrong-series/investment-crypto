@extends('Layout.master')

@section('title')
    <title>Cryptocurrency Wallet</title>

@endsection
<body>
	<!--wrapper-->
	<div class="wrapper">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#withdraw"  style="box-shadow: 4px 3px 4px grey;">Withdraw</button>
					<div class="ms-auto">	
					    <button type="button" data-bs-toggle="modal"
                         data-bs-target="#makeInvestment" style="box-shadow: 4px 3px 4px grey;" class="btn btn-success">Invest</button>		
					</div>
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
						
						
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<!--end page wrapper -->
	@endsection	
	<!--plugins-->
	
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'
	
			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')
	
			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>
	<!--app JS-->
	@section('script')

		@endsection
</body>
</html>