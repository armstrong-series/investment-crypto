@extends('Layout.master')

@section('title')
    <title>account | Dashboard</title>
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
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary font-14">Total Orders</p>
										<h5 class="my-0">8052</h5>
									</div>
									<div class="text-primary ms-auto font-30"><i class='bx bx-cart-alt'></i>
									</div>
								</div>
							 </div>
							<div class="mt-1" id="chart1"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary font-14">Total Revenue</p>
										<h5 class="my-0">$6.2K</h5>
									</div>
									<div class="text-danger ms-auto font-30"><i class='bx bx-dollar' ></i>
									</div>
								</div>
							</div>
							<div class="mt-1" id="chart2"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary font-14">New Users</p>
										<h5 class="my-0">1.3K</h5>
									</div>
									<div class="text-success ms-auto font-30"><i class='bx bx-group'></i>
									</div>
								</div>
							</div>
							<div class="mt-1" id="chart3"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary font-14">Sold Items</p>
										<h5 class="my-0">956</h5>
									</div>
									<div class="text-warning ms-auto font-30"><i class='bx bx-beer'></i>
									</div>
								</div>
							</div>
							<div class="mt-1" id="chart4"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary font-14">Total Visits</p>
										<h5 class="my-0">12M</h5>
									</div>
									<div class="text-info ms-auto font-30"><i class='bx bx-camera-movie'></i>
									</div>
								</div>
							</div>
							<div class="mt-1" id="chart5"></div>
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