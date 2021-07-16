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
				
				/* Preview Image */
				
				np-image-preview {
				padding: 20px;
				background: #eee;
				border-radius: 16px;
				margin: 10px;
				}
				
				.np-image-upload-picker {
				padding: 20px;
				background: #eee;
				border-radius: 16px;
				margin: 10px;
				}
				
				img.np-preview {
				background-color: #fff;
				padding: 5px;
				height: 250px;
				width: 350px;
				margin: 10px;
				}
				.np-upload-btn {
				margin: 10px;
				border: 0px !important;
				font-size: 12px;
				padding: 16px 60px !important;
				font-weight: 200;
				color: #fff;
				border-radius: 15px;
				}
	
			</style>bannerModal
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
												<div class="tab-title">Niche</div>
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
											<button class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#bannerModal" type="button">Create</button>
											
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

				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col" v-for="(asset, index) in all_assets">
						<div class="card radius-10 ">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
									<p v-cloak class="mb-0">@{{ asset.niche }}</p>
									
									<img :src="'/assets-image/'+asset.image" class="d-block w-100" alt="...">
									</div>
									<div class="dropdown ms-auto">
										<div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">	<i class='bx bx-dots-horizontal-rounded font-22'></i>
										</div>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" @click="editThumbnail(asset)" href="javascript:;" data-bs-toggle="modal" data-bs-target="#editThumbnail" >Change Thumbnail</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Delete</a>
											</li>
											
										</ul>
									</div>
								</div>
								<div class="" id="w-chart1"></div>
							</div>
						</div>
					</div>
					
				
					
				</div>
				<!--end row-->
				<!-- <div class="row">
					<div class="col-md-8">
					
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
				</div> -->
			</div>

				<!-- Modal -->
			<div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body"> 						
							<div class="input-group mb-3">
								<input type="text" v-model="assets.niche" class="form-control" placeholder="Specify a Niche">
								<label class="input-group-text" for="inputGroupSelect02">Niche</label>
							</div>
							<div class="input-group">
								<textarea class="form-control" v-model="assets.description" aria-label="With textarea"></textarea>
								<span class="input-group-text">Description</span>
							</div>
		
							<div class="input-group mb-3">
								<div class="fileUpload btn-md text-center"  v-if="imageFile == null || imageFile.length == 0"
									style=" width:150px; padding: 10px; background:navy; color:white;border-radius:6%; float:right; box-shadow: 4px 3px 5px grey">
										<span>Browse Image</span>
										<input type="file" id="uploadBtn file" accept="image/*" name="image" @change="showImagePreview($event)" ref="file" class="form-control upload">
								</div>	
							</div>
							<div class="input-group mb-3">
								<div class="card">
									<div class="card-body">
										<div class="np-image-preview" v-if="imageFile != null && imageFile.length != 0" >
											<img class="np-preview" :src="imageFile"  style="float:center;">
										</div>
									</div>
								</div>
							</div>
							<div v-if="imageFile != null && imageFile.length != 0 && !isImageUploading" style="float:right;">
								<button type="button" @click="clearImage()" class="btn btn-sm btn-outline-secondary">Remove</button>
							</div>
									
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" @click="createAssets()">Save & Continue</button>
						</div>
					</div>
				</div>
			</div>

			<!-- edit thumbnailModal -->
			<div class="modal fade" id="editThumbnail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body"> 													
							<div class="input-group mb-3">
								<div class="fileUpload btn-md text-center"  v-if="imageFile == null || imageFile.length == 0"
									style=" width:150px; padding: 10px; background:navy; color:white;border-radius:6%; float:right; box-shadow: 4px 3px 5px grey">
										<span>Change Thumbail</span>
										<input type="file" id="uploadBtn file" accept="image/*" name="image" @change="showImagePreview($event)" ref="file" class="form-control upload">
								</div>																	
							</div>
							<div class="input-group mb-3">
								<div class="card">
									<div class="card-body">
										<div class="np-image-preview" v-if="imageFile != null && imageFile.length != 0" >
											<img class="np-preview" :src="imageFile"  style="float:center;">
										</div>
									
									</div>
								</div>
							</div>
							<div v-if="imageFile != null && imageFile.length != 0 && !isImageUploading" style="float:right;">
								<button type="button" @click="clearImage()" class="btn btn-sm btn-outline-secondary">Remove</button>
							</div>
									
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save Changes</button>
						</div>
					</div>
				</div>
			</div>
			<!-- /End edit Thumbnail -->
									
		</div>

		<textarea name="" id="createMarktAssets" cols="30" rows="10" style="display:none;">{{ route('admin.create.assets') }}</textarea>
		<textarea name="" id="all_assets" cols="30" rows="10" style="display:none;">{{ json_encode($all_assets) }}</textarea>
		$all_assets

		<!--end page wrapper -->
		@endsection

	</div>
	<!--end wrapper-->
	@section('script')	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   		 <script src="{{ asset('assets/js/app/assets.js') }}"></script>
	@endsection
</body>

</html>