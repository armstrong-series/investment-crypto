@extends('Layout.master')

@section('title')
    <title>Payment Integration </title>
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper" id="investment">
            @section('content')
		<!--start page wrapper -->
		<div class="page-wrapper" id="payment">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#withdraw"  style="box-shadow: 4px 3px 4px grey;">Withdraw</button>
					<div class="ms-auto">	
					    		
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Basic Validation</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									<form class="row g-3 needs-validation" novalidate>
										<div class="col-md-4">
											<label for="validationCustom01" class="form-label">First name</label>
											<input type="text" class="form-control" id="validationCustom01" value="Mark" required>
											<div class="valid-feedback">Looks good!</div>
										</div>
										<div class="col-md-4">
											<label for="validationCustom02" class="form-label">Last name</label>
											<input type="text" class="form-control" id="validationCustom02" value="Otto" required>
											<div class="valid-feedback">Looks good!</div>
										</div>
										<div class="col-md-4">
											<label for="validationCustomUsername" class="form-label">Username</label>
											<div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">@</span>
												<input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
												<div class="invalid-feedback">Please choose a username.</div>
											</div>
										</div>
										<div class="col-md-6">
											<label for="validationCustom03" class="form-label">City</label>
											<input type="text" class="form-control" id="validationCustom03" required>
											<div class="invalid-feedback">Please provide a valid city.</div>
										</div>
										<div class="col-md-3">
											<label for="validationCustom04" class="form-label">State</label>
											<select class="form-select" id="validationCustom04" required>
												<option selected disabled value="">Choose...</option>
												<option>...</option>
											</select>
											<div class="invalid-feedback">Please select a valid state.</div>
										</div>
										<div class="col-md-3">
											<label for="validationCustom05" class="form-label">Zip</label>
											<input type="text" class="form-control" id="validationCustom05" required>
											<div class="invalid-feedback">Please provide a valid zip.</div>
										</div>
										<div class="col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
												<label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
												<div class="invalid-feedback">You must agree before submitting.</div>
											</div>
										</div>
										<div class="col-12">
											<button class="btn btn-primary" type="submit">Submit form</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<h6 class="mb-0 text-uppercase">Browser defaults</h6>
						<hr/>
						
					</div>
				</div>
				<!--end row-->
			</div>
            
		</div>
		<!--end page wrapper -->
		<!--start overlay-->      
        
	</div>
        @endsection
		<!--end page wrapper -->
		<!--start overlay-->
	

    @section('script')
        <script src="{{ asset('assets/js/app/investment.js') }}"></script>
    @endsection
</html>