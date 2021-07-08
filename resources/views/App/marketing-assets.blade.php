@extends('Layout.master')

@section('title')
    <title>Marketing Assets</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@section('content')

		<style>
				.fileUpload {
				position: relative;
				overflow: hidden;
				margin: 10px;
				}
				.fileUpload input.upload {
					position: absolute;
					top: 0;
					right: 0;
					margin: 0;
					padding: 0;
					font-size: 20px;
					cursor: pointer;
					opacity: 0;
					filter: alpha(opacity=0);
				}
				* {
				box-sizing: border-box;
				}
				

			</style>
		<!--start page wrapper -->
		<div class="page-wrapper" id="assets">
			<div class="page-content">
				<!--breadcrumb-->
				
				<!--end breadcrumb-->
                <div class="row">
					<div class="col">
						<h6 class="mb-0 text-uppercase">Assets</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
											<i class="fadeIn animated bx bx-window"></i>
												<div class="tab-title">Banner</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
												</div>
												<div class="tab-title">Advert </div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
											<button class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#bannerModal" type="button">Add Banner</button>
											<div class="fileUpload btn-md text-center"
											 style=" width:150px; padding: 10px; background:navy; color:white;border-radius:6%; float:right; box-shadow: 4px 3px 5px grey">
													<span>Browse Image</span>
													<input type="file" id="uploadBtn file" accept="image/*"  @change="changeProfilePics()" ref="file" class="form-control upload">
											</div>
									</div>
									<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
										<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. 
										 tattooed echo park.</p>
									</div>
							
								</div>
							</div>
						</div>
					</div>
					
                </div>
				<!--end row-->
				<div class="row">
					<div class="col-md-8">
						<!-- <h6 class="mb-0 text-uppercase">Individual Interval</h6>
						<hr/> -->
						<div class="card">
							<div class="card-body">
								<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active" data-bs-interval="10000">
											<img src="{{ asset('assets/images/gallery/32.png') }}" class="d-block w-100" alt="...">
										</div>
										<div class="carousel-item" data-bs-interval="2000">
											<img src="{{ asset('assets/images/gallery/33.png') }}" class="d-block w-100" alt="...">
										</div>
										<div class="carousel-item">
											<img src="{{ asset('assets/images/gallery/34.png') }}" class="d-block w-100" alt="...">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				<!-- Modal -->
			<div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body"> 
						
							<div class="input-group mb-3">
								<select class="form-select">
									<option value="" disabled>Select</option>
									<option value="">Advert</option>									
									<option value="">Banner</option>									
								</select>
								<label class="input-group-text" for="inputGroupSelect02">Niche</label>
							</div>

							<div class="input-group mb-3">
								<textarea name="" id="" cols="30" rows="6" class="form-control" placeholder="Describe your content for this niche"></textarea>
							</div>
									
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save & Continue</button>
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
    <script src="{{ asset('assets/js/app/asset.js') }}"></script>
	@endsection
</body>

</html>