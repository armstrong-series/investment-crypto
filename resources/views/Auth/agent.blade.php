@extends('Layouts.auth')

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
                <img class="img-fluid" src="{{ asset('auth/assets/images/login.png') }}" alt="">
            </div>
            <div class="col-lg-5 col-12">
                <div>
                <h2 class="mb-3">Sign In</h2>
                <form method="post" action="">
                 @csrf
                    <div class="messages"></div>
                    <div class="form-group">
                        <input id="form_email" type="text" name="name" class="form-control" placeholder="Name" required="required" data-error="Name is required">
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="form_address" cols="30" rows="10" placeholder="Enter Address" class="form-control"></textarea>
                    </div> 
                    <div class="form-group">
                        <input id="form_password" type="password" name="password" class="form-control" placeholder="Password" required="required" data-error="password is required.">
                    <div class="help-block with-errors"></div>
                    </div> 
                    <div class="form-group">
                    <input id="form_password" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        <div class="help-block with-errors"></div>
                         </div> 
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </form>
                <div class="d-flex align-items-center mt-4"> <span class="text-muted me-1">Have an account?</span>
                    <a href="{{ route('login')}}">Signin</a>
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