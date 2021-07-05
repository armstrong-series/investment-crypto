@extends('Layout.settings-master')

@section('title')
    <title>Settings | Two Factor Authentication</title>
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
						
						<h6 class="mb-0">Enable Two Factor Authentication</h6>
						<hr/>						
						<div class="card">
							<div class="card-body">

								@if (session('error'))
									<div class="alert alert-danger">
										{{ session('error') }}
									</div>
								@endif
								@if (session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif
								@if($data['user']->twoFactorAuthentication == null)
									<form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
										{{ csrf_field() }}
										<div class="input-group mb-3">
											<button type="submit" class="btn-md btn-primary">Generate Secret Key to Enable 2FA</button>
										</div>
									</form>
									@elseif(!$data['user']->twoFactorAuthentication->google2fa_enable)
									1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: <code>{{ $data['secret'] }}</code><br/>
										<img src="{{$data['google2fa_url'] }}" alt="qrcode_image" class="img-responsive">
											<br/><br/>
									2. Enter the pin from Google Authenticator app:<br/><br/>
									<form  method="POST" action="{{ route('enable2fa') }}">
											{{ csrf_field() }}
										<div class="input-group mb-3{{ $errors->has('verify-code') ? ' has-error' : '' }}">
											<input id="secret" type="password" class="form-control" placeholder="Enter Password">
											@if ($errors->has('verify-code'))
												<span class="help-block">
												<strong>{{ $errors->first('verify-code') }}</strong>
												</span>
											@endif
											<label id="secret" class="input-group-text" for="inputGroupSelect02">Password</label>
										</div>
										<button type="submit" class="btn-md btn-primary">Enable 2FA</button>
									</form>
									@elseif($data['user']->loginSecurity->google2fa_enable)
										<div class="alert alert-success">
											2FA is currently <strong>enabled</strong> on your account.
										</div>
										<p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
										<form  method="POST" action="{{ route('disable2fa') }}">
											{{ csrf_field() }}
											<div class="input-group mb-3{{ $errors->has('current-password') ? ' has-error' : '' }}">
												<label for="change-password" class="control-label">Current Password</label>
												<input id="current-password" type="password" class="form-control " name="current-password" required>
													@if ($errors->has('current-password'))
														<span class="help-block"><strong>{{ $errors->first('current-password') }}</strong></span>
										
													@endif
											</div>
											<button type="submit" class="btn btn-md btn-primary ">Disable 2FA</button>
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
		
	@endsection
</body>
</html>