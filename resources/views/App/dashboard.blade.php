@extends('Layout.master')

@section('title')
    <title>Dashboard </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

@endsection

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@section('content')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
				
						<hr/>
						<div class="card radius-10 bg-success bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">Total Investment</p>
										<h4 class="my-1 text-white">{{ $total_investment }}&nbsp;<small>BTC</small></h4>
									</div>
									<div class="widgets-icons bg-white text-success ms-auto">
										<i class='bx bxs-wallet'></i>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<hr/>
						<div class="card radius-10 bg-primary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-white">ROI</p>
										<h4 class="my-1 text-white">{{ $total_roi }}<small>BTC</small></h4>
									</div>
									<div class="widgets-icons bg-white text-primary ms-auto"><i class='bx bxs-wallet'></i>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!--end row-->
				

				<!-- <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2"> -->
				<div class="row row-cols-1 row-cols-md-8">
					
					<div class="col">
						<hr/>
						<div class="card radius-10 bg-secondary bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<!-- <p class="mb-0 text-white"></p> -->
										<!-- <h4 class="my-1 text-white">845&nbsp;<small>USD</small></h4> -->
										<h4 class="my-1 text-white">{{ Auth::user()->name }}</h4>
									</div>
									<div class="widgets-icons bg-white text-secondary ms-auto">
										<h1><i class='lni lni-user'></i></h1>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		@endsection

	</div>
	<!--end wrapper-->
	@section('script')	

	@endsection
</body>

</html>