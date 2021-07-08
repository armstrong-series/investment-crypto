@extends('Layout.master')

@section('title')
    <title>Admin| Dashboard</title>
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
										<p class="mb-0 text-secondary font-14">Total Transactions</p>
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
										<p class="mb-0 text-secondary font-14">Daily Transactions</p>
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
										<p class="mb-0 text-secondary font-14">Weekly Transactions</p>
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
										<p class="mb-0 text-secondary font-14">Regulars</p>
										<h5 class="my-0">{{ $count_regulars }}</h5>
									</div>
									<div class="text-warning ms-auto font-30"><i class='bx bx-beer'></i>
									</div>
								</div>
							</div>
							<div class="mt-1" id="chart4"></div>
						</div>
					</div>
					
				  </div><!--end row-->
				 
				 
				 <div class="card radius-10">
					<div class="card-body">
					   <div class="d-flex align-items-center float-right">
					   <button type="button"
					    style="border-radius: 50%; box-shadow: 3px 4px 4px grey;"
						 class="btn btn-md btn-primary"data-bs-toggle="modal"
                         data-bs-target="#users" >+</button>  
					   </div>
					  
					<div class="table-responsive">
					  <table class="table align-middle mb-0">
					   <thead class="table-light">
						<tr>
						  <th>Profile</th>
						  <th>Name</th>
						  <th>Email</th>
						  <th>Date</th>
						  <th>Action</th>
						</tr>
						</thead>
						<tbody><tr>
						 <td>Iphone 5</td>
						 <td><img src="assets/images/products/01.png" class="product-img-2" alt="product img"></td>
							<td>#9405822</td>
							<td>$1250.00</td>
						 <td>
                            <button type="button" class="btn btn-sm"><i class="lni lni-pencil"></i></button>
                            <button type="button" class="btn btn-sm"><i class="lni lni-trash"></i></button>
                         </td>
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