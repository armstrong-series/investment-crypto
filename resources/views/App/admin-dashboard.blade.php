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
					
				<hr/>
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Subscriber(s)</p>
										<h4 class="my-1">{{ $count_regulars }}</h4>
									</div>
									<div class="text-secondary ms-auto font-35">
										<i class='fas fa-users'></i>
										
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
										<p class="mb-0 text-secondary">Supported Coin</p>
										<h4 class="my-1">4</h4>
									</div>
									<div class="text-primary ms-auto font-35"><i class='bx bxl-chrome'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">	
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="text-center">
									<div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3"><i class='bx bxl-linkedin-square'></i>
									</div>
									<h4 class="my-1">56K</h4>
									<p class="mb-0 text-secondary">Linkedin Followers</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="text-center">
									<div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3"><i class='bx bxl-youtube'></i>
									</div>
									<h4 class="my-1">38M</h4>
									<p class="mb-0 text-secondary">YouTube Subscribers</p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!--end row-->
				
				
			</div>
		</div>
		@endsection
		<!--end page wrapper -->
		<!--start overlay-->

	@section('script')
	@endsection
</body>
</html>