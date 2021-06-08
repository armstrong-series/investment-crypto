@extends('Layout.master')

@section('title')
    <title>Account | Dashboard</title>
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<!--end header -->
		<!--start page wrapper -->
		@section('content')
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
				<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"> Total Withdrawals</p>
										<h4 class="my-1">$4805</h4>
										
									</div>
									<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-wallet"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Transaction</p>
										<h4 class="my-1">8.4K</h4>
									</div>
									<div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-group'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Total Investment</p>
										<h4 class="my-1">59K</h4>
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-binoculars'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Bounce Rate</p>
										<h4 class="my-1">34.46%</h4>
										<p class="mb-0 font-13 text-danger"><i class='bx bxs-down-arrow align-middle'></i>12.2% from last week</p>
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				  </div><!--end row-->
				 
				 
				 <div class="card radius-10">
					<div class="card-body">
					   <div class="d-flex align-items-center">
						   <div>
							   <h6 class="mb-0">Recent Orders</h6>
						   </div>
						   <div class="dropdown ms-auto">
							   <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
							   </a>
							   <ul class="dropdown-menu">
								   <li><a class="dropdown-item" href="javascript:;">Action</a>
								   </li>
								   <li><a class="dropdown-item" href="javascript:;">Another action</a>
								   </li>
								   <li>
									   <hr class="dropdown-divider">
								   </li>
								   <li><a class="dropdown-item" href="javascript:;">Something else here</a>
								   </li>
							   </ul>
						   </div>
					   </div>
					<div class="table-responsive">
					  <table class="table align-middle mb-0">
					   <thead class="table-light">
						<tr>
						  <th>Product</th>
						  <th>Photo</th>
						  <th>Product ID</th>
						  <th>Status</th>
						  <th>Amount</th>
						  <th>Date</th>
						  <th>Shipping</th>
						</tr>
						</thead>
						<tbody><tr>
						 <td>Iphone 5</td>
						 <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
						 <td>#9405822</td>
						 <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
						 <td>$1250.00</td>
						 <td>03 Feb 2020</td>
						 <td><div class="progress" style="height: 6px;">
							   <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
							 </div></td>
						</tr>
					   </tbody>
					 </table>
					 </div>
					</div>
			   </div>

			</div>
		</div>
		@endsection
		<!--end page wrapper -->
		<!--start overlay-->

	@section('script')
	@endsection
</body>
</html>