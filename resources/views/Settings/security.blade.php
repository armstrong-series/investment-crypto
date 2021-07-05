@extends('Layout.settings-master')

@section('title')
    <title>Settings | Security</title>
	<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
@endsection
<body>
	<!--wrapper-->
	<div class="wrapper">
    @section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0">Edit Profile</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Enter Name">
									<label class="input-group-text" for="inputGroupSelect01">Name</label>
								</div>
								<div class="input-group mb-3">
									<input type="text" disabled name="" id="" class="form-control" placeholder="{{ Auth::user()->email }}">
									<label class="input-group-text" for="inputGroupSelect02">Email</label>
								</div>
								<div class="input-group mb-3">
									<input type="password" class="form-control" placeholder="Enter Password">
									<label class="input-group-text" for="inputGroupSelect02">Password</label>
								</div>
								<div class="input-group mb-3">
									<button class="btn btn-outline-primary" type="button">Update</button>
								</div>
							</div>
						</div>
						
						<h6 class="mb-0">Enable Two Factor Authentication</h6>
						<hr/>


						<div class="card">
						  <div class="card-body">			
							@if(!count($data['user']->passwordSecurity))
								<p> Enable 2FA to your account</p>
								<p> Click the generate secret button to generate your code</p>
								<p> Enter this in your Google Authentication App</p>
								<form action="{{ route('generateSecretCode') }}" method="post">
									{{ csrf_field() }}
									<div class="input-group mb-3">
										<button class="btn btn-info btn-block" type="submit">Generate Secret Key</button>
									</div>
								</form>
							@elseif(!$data['user']->passwordSecurity->google2fa_enable)
								<p>Please Scan this Barcode with Google Authenticator App</p>
								<img src="{{ $data['google2faUrl']}}" class="img-responsive" alt="Qr-code">

								<form action="{{ route('enable2fa') }}" method="POST">
									{{ csrf_field() }}

									<div class="input-group mb-3">
										<input id="verify-code" name="verify-code" type="password" class="form-control" placeholder="Enter Password">
										<label class="input-group-text" for="inputGroupSelect02">Password</label>
									</div>
									<div class="input-group mb-3">
										<button class="btn btn-success btn-md" type="submit">Enable 2FA</button>
									</div>
								</form>
							@elseif($data['user']->passwordSecurity->google2fa_enable)
								<p>2FA is enabled</p>

								<form action="{{ route('disable2fa') }}" method="POST">
									{{ csrf_field() }}
									<div class="input-group mb-3">
										<input name="currentPassword" id="currentPassword" type="password" class="form-control" required placeholder="Enter  Current Password">	
									</div>

									<div class="input-group mb-3">
										<button class="btn btn-danger btn-md" type="submit">Disable 2FA</button>
									</div>
								</form>
							@endif						
						  </div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<!--end page wrapper -->
	@endsection	
	<!--plugins-->
	

	<!--app JS-->
	@section('script')
		<script src="https://unpkg.com/@popperjs/core@2"></script>
		<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
	@endsection
</body>
</html>