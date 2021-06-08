@extends('Layout.auth')

@section('title')
<title>Account |Login</title>
@endsection

@section('auth-content')
<div class="page-content">

<!--login start-->

        <section>
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-7 col-12">
                <img class="img-fluid" src="{{ asset('auth/assets/img/auth.jpg') }}" alt="">
                <!-- <img class="img-fluid" src="{{ asset('auth/assets/img/password.png') }}" alt=""> -->
            </div>
            <div class="col-lg-5 col-12">
                <div>
                <h2 class="mb-3">Sign In</h2>
                @include('Includes.messages')
                <form method="post" action="{{ route('auth.login.account') }}">
                 @csrf
                    <div class="messages"></div>
                    <div class="form-group">
                    <input id="form_email" type="text" name="email" class="form-control" placeholder="Enter Email" required="required" data-error="Email field.">
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                    <input id="form_password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                    <div class="help-block with-errors"></div>
                    </div> 
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex align-items-center mt-4"> <span class="text-muted me-1">Don't have an account?</span>
                    <a href="{{ route('auth.register') }}">Sign Up</a>
                </div>
                <div class="d-flex align-items-center mt-4">
                    <a href="{{ route('auth.password-forgot') }}">Forgot Password?</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!--login end-->
     

<!--newsletter end-->

</div>
@endsection