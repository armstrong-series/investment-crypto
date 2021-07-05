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
                
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">TRANSACTION HISTORY</h6>
				<hr/>
				<div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-2">
					<div class="col">
						<div class="card">
							<div class="row g-0">
								<div class="col-md-4">
									<img src="assets/images/gallery/10.png" alt="..." class="card-img">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
										<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!--end row-->

				
				<h6 class="mb-0 text-uppercase">Transactions</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>TxnId</th>
										<th>Type</th>
										<th>Coin</th>
										<th>Amount</th>
										<th>Coin Address</th>
										<th>ROI</th>
										<th>Date</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="transaction in transactions">
										<td>@{{ transaction.txn_id }}</td>
										<td>@{{ transaction.trans_type }}</td>
										<td>@{{ transaction.coin }}</td>
										<td>@{{ transaction.amount}}</td>
										<td>@{{ transaction.crypto_address }}</td>
										<td>@{{ transaction.increment }}</td>
										<td>@{{ transaction.txn_date }}</td>
										<td>@{{ transaction.status }}</td>				
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-defauly split-bg-default dropdown-toggle dropdown-toggle-split"
												 data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span> Action
												</button>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu">
													<a class="dropdown-item" href="#">Remove</a>			
												</div>
											</div>
										</td>
									</tr>	
								</tbody>	
							</table>
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