
@extends('Layout.master')

@section('title')
    <title>Profile </title>

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
		<div class="page-wrapper" id="profile">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">

										<div class="d-flex flex-column align-items-center text-center">
											<img  v-if="!imageFile" src="{{ asset('/assets/images/man.png') }}" alt="Admin" class="rounded-circle p-1" width="110">	
											<img v-bind:src="imagePreview" alt="Profile-pics" v-show="showPreview" class="rounded-circle p-1" height="200" width="200">
											<div class="mt-3">
												<h4>{{ Auth::user()->name }}</h4>
												@if(Auth::user()->user_type === 'regular')
													<p class="text-secondary mb-1">Regular</p>
												@elseif(Auth::user()->user_type === 'admin')
													<p class="text-secondary mb-1">Administrator</p>
												@elseif(Auth::user()->user_type === 'support')
													<p class="text-secondary mb-1">Support Staff</p>
												@endif
												<!-- <button class="btn btn-primary">Change Picture</button> -->
												<div class="fileUpload btn-md btn-primary" style=" padding: 10px; border-radius:6%; box-shadow: 4px 3px 5px grey;">
													<span>Change Picture</span>
													<input type="file" id="uploadBtn file" accept="image/*"  @change="changeProfilePics()" ref="file" class="form-control upload">
												</div>
												<!-- <progress max="100" :value.prop="uploadPercentage"></progress> -->
												
											</div>
										</div>
										<hr class="my-4" />	
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" placeholder="Enter Name" v-model="profile.name">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" disabled placeholder="{{ Auth::user()->email}}">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" v-model="profile.mobile">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nationality</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" v-model="profile.nationality" class="form-control" placeholder="Enter your Nationality">
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="button" v-on:click="updateprofile()" class="btn btn-primary px-4" value="Save Changes" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<textarea name=""  style="display:none;" id="profileUpdate" cols="30" rows="10">{{ route('user.profile.update')}}</textarea>
		</div>
		
		@endsection
		<!--end page wrapper -->
		
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@section('script')
		<script src="{{ asset('assets/js/app/settings/profile.js') }}"></script>
	
	@endsection
</body>
</html>