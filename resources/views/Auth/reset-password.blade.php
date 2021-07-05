@extends('Layout.auth')

@section('title')
<title>Account | Password-reset</title>
@endsection

@section('auth-content')
<div class="page-content">
<!--login start-->

        <section>
        <div class="container">
            <div class="row align-items-center">
            <!-- <div class="col-lg-7 col-12">
                <img class="img-fluid" src="{{ asset('auth/assets/img/forgot-pass.jpg') }}" alt="">
            </div> -->
            <div class="col-lg-5 col-12">
                <div>
                <h3 class="mb-3">Update Password</h3>
                @include('Includes.messages')
                <form method="POST" action="{{route('auth.update-password')}}">
                 @csrf
                    <div class="messages"></div>
                    <div class="form-group">
                    <input id="form_email" type="text" name="email" class="form-control" placeholder="Enter New Password" required="required" data-error="Password field.">
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                    <input id="form_password" type="password" name="re-type_password" class="form-control" placeholder="Confirm Password" required="required" data-error="Password field.">
                    <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button> 
                </form>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!--login end-->
     

<!--newsletter end-->

</div>
@endsection