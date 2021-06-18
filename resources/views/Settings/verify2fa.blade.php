@extends('Layout.settings-master')

@section('title')
    <title>Security | 2fa-verification</title>
	
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
						<h6 class="mb-0">Two-step Verification</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
                            <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                Enter the pin from Google Authenticator app:<br/><br/>
                                <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
                                        <input type="text" id="one_time_password" Placeholder="Enter OTP" name="one_time_password" class="form-control" required/>
                                        <label class="input-group-text" for="one_time_password">One Time Password</label>
                                    </div>
                                    <button class="btn btn-md btn-primary" type="submit">Authenticate</button>
                                </form>
								<!-- <div class="input-group mb-3">
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
								</div> -->
							</div>
						</div>
						<hr/>	
						
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