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
										<p class="mb-0 text-secondary font-14">Users</p>
										<h5 class="my-0">956</h5>
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
						 class="btn btn-md btn-primary" data-toggle="modal" data-target="#users">+</button>  
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
				<!-- Modal -->
				<div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Username">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Email Address">
						</div>
						<label for="">Password</label>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Enter Password">
						</div>
						<label for="">Confirm Password</label>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Confirm Password">
						</div>
						<label for="">Attach a Profile Image</label>
						<div class="form-group">
							<input type="file" class="form-control">
						</div>
							<label for="">User Role</label>
						<div class="form-group">
							<select name="" id="" class="form-control">
								<option value="admin">Admin</option>
								<option value="support">Support</option>
								<option value="regular">Regular</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary btn-md">Proceed</button>
						<button class="btn btn-outline-success" type="button" disabled>
 						 	<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  								Processing...
						</button>
					</div>
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