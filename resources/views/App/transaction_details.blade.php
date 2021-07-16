@extends('Layout.master')

@section('title')
    <title>Transaction Details</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}" />
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper">
	@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper" id="transactions">
			<div class="page-content">
				
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="toolbar hidden-print">
								<div class="text-end">
									<button @click="approveTransaction()" type="button" style="color:white; box-shadow:3px 4px 3px grey;" class="btn btn-info px-5">
										<i class="fas fa-check-circle"></i>&nbsp;&nbsp;Confirm Transaction</button>
								</div>
								<hr/>
							</div>
							<div class="invoice overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<!-- <div class="col">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
											</div> -->
											<!-- <div class="col company-details">
												<h2 class="name">
													<a target="_blank" href="javascript:;">
													Arboshiki
													</a>
												</h2>
												<div>455 Foggy Heights, AZ 85004, US</div>
												<div>(123) 456-789</div>
												<div>company@example.com</div>
											</div> -->
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-details">
												<!-- <h1 class="invoice-id">INVOICE 3-2-1</h1> -->
												<div class="date">Date of Transaction: {{ $transaction->txn_date }}</div>	
											</div>
										</div>
		
							
										<div class="notices">
											<div>TRANSACTION REF:</div>
											<div class="notice">{{ $transaction->txn_id }}</div>
										</div>
									</main>
									<!-- <footer>Invoice was created on a computer and is valid without the signature and seal.</footer> -->
								</div>
								<div>

								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
     @endsection
	</div>
	<!--end wrapper-->
	<!--start switcher-->

    @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="{{ asset('assets/js/app/transactions.js') }}"></script>
	@endsection

</body>
</html>