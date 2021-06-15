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

			</div>
		</div>
		@endsection
		<!--end page wrapper -->
		<!--start overlay-->

	@section('script')
	@endsection
</body>
</html>