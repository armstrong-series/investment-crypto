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
            <div class="col-lg-7 col-12">
                <img class="img-fluid" src="{{ asset('auth/assets/img/forgot-pass.jpg') }}" alt="">
            </div>
            <div class="col-lg-5 col-12">
                <div>
                <h3 class="mb-3">Forgot your Password ?</h3>
                @include('Includes.messages')
                <form method="post" action="{{ route('auth.password-recover') }}">
                 @csrf
                    <div class="messages"></div>
                    <div class="form-group">
                    <input id="form_email" type="text" name="email" class="form-control" placeholder="Enter Email Address" required="required" data-error="Email field.">
                    <div class="help-block with-errors"></div>
                    </div>
                    <button type="submit" class="btn btn-primary"><small>Reset</small></button>
                    <a href="{{ route('login') }}" style="float: right;"><small>Remember now?</small></a>
                </form>
                <!-- <div class="d-flex align-items-center mt-4">
                    <a href="{{ route('login') }}"><small>Remember now?</small></a>
                </div> -->
                </div>
            </div>
            </div>
        </div>
        </section>

        <!--login end-->
     

<!--newsletter end-->

</div>
@endsection